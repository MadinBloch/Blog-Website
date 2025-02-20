<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Categorie;
use Auth;
use Http;
use Illuminate\Http\Request;
use Log;
use OpenAI\Laravel\Facades\OpenAI;
use Validator;
use Illuminate\Http\JsonResponse;

class BlogController extends Controller
{
    public function index()
    {
        $allblogs = Blog::all();
        return view('welcome',compact('allblogs'));
    }

    public function singleblog()
    {
        return view('Frontend.single');
    }

    public function category()
    {
        return view('Frontend.category');
    }

    public function addblog()
    {
        $categories = Categorie::all();

        return view('dashboard.addblog', compact('categories'));
    }

    public function dashboard()
    {

        $allblogs = Blog::where('user_id', Auth::id())->latest()->get(); // Fetch blogs for the logged-in user
        return view('dashboard.dashboard', compact('allblogs'));
    }
    public function createBlog(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'blogTitle' => 'required|string|max:255',
            'blogCategory' => 'required|integer|exists:categories,id',
            'blogImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'blogContent' => 'required|string|min:10',
            'blogStatus' => 'required|in:published,draft',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $userId = Auth::id(); // Get logged-in user ID

        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('blogImage')) {
            $imagePath = $request->file('blogImage')->store('blog_images', 'public');
        }

        // Create blog post``
        Blog::create([
            'user_id' => $userId,
            'category_id' => $request->blogCategory,
            'title' => $request->blogTitle,
            'content' => $request->blogContent,
            'image' => $imagePath,
            'status' => $request->blogStatus,
        ]);
        return redirect()->route('allblogs')->with('success', 'Blog created successfully!');
    }

    // Show all blogs for the logged-in user
    public function allBlogs()
    {
        $allblogs = Blog::where('user_id', Auth::id())->latest()->get(); // Fetch blogs for the logged-in user
        return view('dashboard.allblogs', compact('allblogs'));
    }


    public function deleteBlog(Request $request)
    {
        $blog = Blog::find($request->id);
        if ($blog) {
            $blog->delete();
            return redirect()->route('allblogs')->with('success', 'Blog deleted successfully!');
        }
        return redirect()->route('allblogs')->with('error', 'Blog not found!');

    }

    public function editBlog($id){

        $blog = Blog::find($id);
        $categories = Categorie::all();
        return view('dashboard.edit', compact('blog', 'categories'));
    }

    public function updateblog(Request $request, $id)
    {
        $blog = Blog::findOrFail($id); // Find blog by ID

        // Validation rules
        $validator = Validator::make($request->all(), [
            'blogTitle' => 'required|string|max:255',
            'blogCategory' => 'required|integer|exists:categories,id',
            'blogImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'blogContent' => 'required|string|min:10',
            'blogStatus' => 'required|in:published,draft',
        ]);

        // Check validation errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Handle image update
        if ($request->hasFile('blogImage')) {
            $imagePath = $request->file('blogImage')->store('blog_images', 'public');
        } else {
            $imagePath = $blog->image; // Keep the old image if not updated
        }

        // Update blog post
        $blog->update([
            'title' => $request->blogTitle,
            'category_id' => $request->blogCategory,
            'content' => $request->blogContent,
            'image' => $imagePath,
            'status' => $request->blogStatus,
        ]);

        return redirect()->route('allblogs')->with('success', 'Blog updated successfully!');
    }

    public function showGeneratePage()
    {
        return view('dashboard.generate');
    }


    public function generateblogContent(Request $request)
    {

        //  // Validate input
        //  $request->validate([
        //     'message' => 'required|string'
        // ]);

        // return response()->json([
        //     'message' => 'This is a test response',
        //     'input' => $request->message
        // ],200);

        // $apiKey = env('OPENROUTER_API_KEY');
        // $url = 'https://openrouter.ai/api/v1/chat/completions';

        // try {
        //     $response = Http::withHeaders([
        //         'Authorization' => "Bearer $apiKey",
        //         'Content-Type' => 'application/json',
        //     ])->post($url, [
        //         'model' => 'google/gemini-2.0-flash-exp:free',
        //         'messages' => [['role' => 'user', 'content' => $request->message]],
        //     ]);

        //     Log::info("API Response", [
        //         'status' => $response->status(),
        //         'body' => $response->body()
        //     ]);

        //     if ($response->failed()) {
        //         return response()->json([
        //             'error' => 'API request failed',
        //             'details' => $response->body()
        //         ], 500);
        //     }

        //     return response()->json($response->json());

        // } catch (\Exception $e) {
        //     Log::error("API Request Error: " . $e->getMessage());
        //     return response()->json([
        //         'error' => 'Something went wrong',
        //         'details' => $e->getMessage()
        //     ], 500);
        // }

        $request->validate([
            'message' => 'required|string'
        ]);

        // $apiKey = env('OPENROUTER_API_KEY'); // Store API key in .env
        // $url = 'https://openrouter.ai/api/v1/chat/completions';

    //     $response = [
    //         'choices' => [
            // [
            //     'message' => [
            //         'role' => 'assistant',
            //         'content' => 'This is a test AI-generated blog response.'
            //     ]
            // ]
    //     ]
    // ];
        // $response = Http::withHeaders([
        //     'Authorization' => "Bearer $apiKey",
        //     // 'HTTP-Referer' => config('app.url'), // Use your actual website URL
        //     // 'X-Title' => 'YourSiteName',
        //     'Content-Type' => 'application/json',
        // ])->post($url, [
        //     'model' => 'google/gemini-2.0-flash-exp:free',
        //     'messages' => [['role' => 'user', 'content' => $request->message]],
        // ]);


        return response()->json($this->callOpenRouterAPI($request->message));

    }

    private function callOpenRouterAPI(string $message): array
{
    $apiKey = env('OPENROUTER_API_KEY'); // Make sure this exists in .env
    $url = 'https://openrouter.ai/api/v1/chat/completions';

    $response = Http::withHeaders([
        'Authorization' => "Bearer $apiKey",
        'Content-Type' => 'application/json',
    ])->post($url, [
        'model' => 'google/gemini-2.0-flash-exp:free',
        'messages' => [['role' => 'user', 'content' => $message]],
    ]);

    // Log full response for debugging
    Log::info('API Response:', $response->json());

    if ($response->failed()) {
        return ['error' => 'API request failed', 'details' => $response->body()];
    }

    return $response->json();
}
}

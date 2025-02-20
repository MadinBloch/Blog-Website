@extends('dashboard.layouts.main')

@section('content')
    <main id="main" class="main">

        <div class="container">
			<h2>Generate AI Blog</h2>
			<div class="form-group">
				<input
					type="text"
					class="form-control"
					id="userInput"
					placeholder="Enter your question" />
			</div>
			<button class="btn btn-success mt-2" onclick="sendMessage()">Generate!</button>
			<div id="response"></div>
		</div>
        {{-- <div class="container">
            <h1>Generate AI Blog</h1>

            <div id="errorMessage" class="alert alert-danger" style="display: none;"></div>


            <form id="generateBlogForm">
                @csrf
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="mb-3">
                    <label for="blogTopic" class="form-label">Enter Blog Topic</label>
                    <input type="text" class="form-control" id="blogTopic" name="topic" placeholder="Enter topic..." required>
                </div>
                <button type="submit" class="btn btn-primary">Generate Blog</button>
            </form> --}}

{{--
            <div id="blogResult" class="mt-4" style="display: none;">
                <h2>Generated Blog</h2>
                <form action="#" method="POST">
                    @csrf
                    <input type="hidden" name="title" id="blogTitle">
                    <input type="hidden" name="meta_description" id="metaDescription">
                    <input type="hidden" name="content" id="blogContent">

                    <h3 id="generatedTitle"></h3>
                    <p><strong>Meta Description:</strong> <span id="generatedMeta"></span></p>
                    <textarea class="form-control" name="content" id="editedContent" rows="10"></textarea>

                    <button type="submit" class="btn btn-success mt-3">Save Blog</button>
                </form>
            </div> --}}
        </div>
    </main>
    <script>
        async function sendMessage() {
            const input = document.getElementById('userInput').value;
            const responseDiv = document.getElementById('response');
            if (!input) {
                responseDiv.innerHTML = 'Please enter a message.';
                return;
            }
            responseDiv.innerHTML = 'Genrating blog...';
            try {
                const response = await fetch(
                    'https://openrouter.ai/api/v1/chat/completions',
                    {
                        method: 'POST',
                        headers: {
                            Authorization: 'Bearer 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',
                            'HTTP-Referer': 'https://www.sitename.com',
                            'X-Title': 'SiteName',
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            model: 'google/gemini-2.0-flash-exp:free',
                            messages: [{ role: 'user', content: input }],
                        }),
                    },
                );
                const data = await response.json();
                console.log(data);
                const markdownText =
                    data.choices?.[0]?.message?.content || 'No response received.';
                responseDiv.innerHTML = marked.parse(markdownText);
            } catch (error) {
                responseDiv.innerHTML = 'Error: ' + error.message;
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
@endsection

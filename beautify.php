<!DOCTYPE html>
<html>
<head>
    <title>HTML Beautifier</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f3f3f3;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        h1, h2 {
            color: #333;
            margin: 0 0 20px;
            padding: 0;
        }

        form {
            margin-bottom: 20px;
        }

        textarea {
            width: 100%;
            height: 200px;
            border: 1px solid #ccc;
            padding: 10px;
            font-size: 14px;
            resize: vertical;
        }

        input[type="button"], button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 14px;
            cursor: pointer;
        }

        input[type="button"]:hover, button:hover {
            background-color: #0056b3;
        }

        hr {
            border: none;
            border-top: 1px solid #ccc;
            margin: 20px 0;
        }

        pre {
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 10px;
            font-size: 14px;
            overflow-x: auto;
        }

        button.copy-button {
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>HTML Beautifier</h1>
        <form>
            <textarea id="htmlCode" placeholder="Paste your HTML code here..."></textarea>
            <br>
            <input type="button" value="Beautify" onclick="beautifyHTML()">
        </form>
        <hr>
        <h2>Output:</h2>
        <pre id="output"></pre>

        <button class="copy-button" onclick="copyToClipboard()">Copy Output</button>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/prettier@2.4.1/standalone.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/prettier@2.4.1/parser-html.js"></script>
    <script>
        function beautifyHTML() {
            var htmlCode = document.getElementById("htmlCode").value;
            try {
                var formattedHTML = prettier.format(htmlCode, {
                    parser: "html",
                    plugins: window.prettierPlugins
                });
                document.getElementById("output").textContent = formattedHTML;
            } catch (error) {
                alert("An error occurred while beautifying HTML.");
                console.error("An error occurred while beautifying HTML:", error);
            }
        }

        function copyToClipboard() {
            var outputElement = document.getElementById("output");
            var range = document.createRange();
            range.selectNode(outputElement);
            window.getSelection().removeAllRanges();
            window.getSelection().addRange(range);
            document.execCommand("copy");
            window.getSelection().removeAllRanges();
            alert("Output copied to clipboard!");
        }
    </script>
</body>
</html>

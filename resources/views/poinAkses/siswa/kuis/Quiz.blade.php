<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="{{asset('AdminLTE/dist/css/adminlte.min.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('Kuis/style.css')}}">
    <title>Document</title>
</head>
<body>
    <div class="app">
        <!-- <button class="btn-success">button</button> -->
        <div id="quiz-section">
            <h1> Kuis Sederhana</h1>
            <!-- <span id="score"></span> -->
            <div class="quiz">
                <h2 id="question">
                    Kuis Dibawah Sini
                </h2>
                {{-- <div id="answer-buttons">
                    <button class="btn">Jawaban 1</button>
                    <button class="btn">Jawaban 2</button>
                    <button class="btn">Jawaban 3</button>
                    <button class="btn">Jawaban 4</button>
                </div> --}}
                <button id="next-btn">x</button>
            </div>
        </div>
        <div id="score-section" class="score">
            <h1>Score</h1>
            <hr>
            <h3 id="score"></h3>
        </div>
    </div>
    <script src="{{asset('Kuis/new-sct-fixed.js')}}"></script>
</body>
<script src="{{asset('AdminLTE/dist/js/adminlte.min.js')}}"></script>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <title>Document</title>
    <style>
        span {
            color: red;
            display: block;
            font-style: italic;
        }
    </style>
</head>

<body>
    <header class="headsec">

        <p>Good Vibes Form</p>

    </header>
    <section class="mainsec">
        <div class="innersec">

            <form action="{{ route('store') }}" method="post" class="form1">
                @csrf
                <div class="form-description">
                    <p>Tell us something positive that happaned to you today.</p>
                </div>
                <div class="block">
                    <div>
                        <div class="form-label input-label">
                            <label for="">Name</label>
                        </div>
                        <div class="form-input ">
                            <input type="text" name="name" placeholder="  Enter your name" class="input-style">
                            @error('name')
                        <span>{{ $message }}</span>
                    @enderror
                        </div>
                    </div>

                </div>

                <div class="block">
                    <div class="form-label input-label">
                        <label for="">Email</label>
                    </div>
                    <div class="form-input">
                        <input type="email" name="email" placeholder="  Enter your email address"
                            class="input-style">
                            @error('email')
                        <span>{{ $message }}</span>
                    @enderror
                    </div>
                </div>
                <div class="block">
                    <div class="form-label input-label">
                        <label for="">On a scale of 1-10,how good was it?</label>
                    </div>
                    <div class="form-input">
                        <input type="number" name="number" placeholder="  Enter a number between 1 and 10"
                            class="input-style">
                            @error('number')
                        <span>{{ $message }}</span>
                    @enderror
                    </div>
                </div>
                <div class="block">
                    <div class="form-label input-label">
                        <label for="">Where did it happen?</label>
                    </div>
                    <div class="form-input">
                        <select name="place" id="" class="form-option">
                            <option value="Home">At Home</option>
                            <option value="School">At School</option>
                        </select>
                        @error('place')
                        <span>{{ $message }}</span>
                    @enderror
                    </div>
                </div>
                <div class="block">
                    <div class="form-label">
                        <label for="">At What time of day did it happen?</label>
                    </div>
                    <div class="form-input">
                        <div>
                            <input type="radio" name="time" value="Morning">
                            <label for="">Morning</label>
                        </div>
                        <div>
                            <input type="radio" name="time" value="Afternoon">
                            <label for="">Afternoon</label>
                        </div>
                        <div>
                            <input type="radio" name="time" value="Evening">
                            <label for="">Evening</label>
                        </div>
                        <div>
                            <input type="radio" name="time" value="">
                            <label for="">None</label>
                        </div>
                        @error('time')
                        <span>{{ $message }}</span>
                    @enderror


                    </div>
                </div>
                <div class="block">
                    <div class="form-label">
                        <label for="">What emotions did you experiance?(select All that Apply)</label>
                    </div>
                    <div class="form-input">
                        <div>
                            <input type="checkbox" name="mood[]" value="Excited">
                            <label for="">Excited</label>
                        </div>
                        <div>
                            <input type="checkbox" name="mood[]" value="Humbeled">
                            <label for="">Humbeled</label>
                        </div>
                        <div>
                            <input type="checkbox" name="mood[]" value="Elated">
                            <label for="">Elated</label>
                        </div>
                        <div>
                            <input type="checkbox" name="mood[]" value="Loved">
                            <label for="">Loved</label>
                        </div>
                        <div>
                            <input type="checkbox" name="mood[]" value="Enthusiastic">
                            <label for="">Enthusiastic</label>
                        </div>
                        @error('mood')
                        <span>{{ $message }}</span>
                    @enderror

                    </div>
                </div>

                <div class="block">
                    <div class="form-label">
                        <label for="">Please describe your positive Experiance</label>
                    </div>
                    <div class="form-input">
                        <textarea name="experience" id="summernote" name="editordata" class="form-textarea"></textarea>
                            @error('experience')
                        <span>{{ $message }}</span>
                    @enderror
                    </div>
                </div>
                <div class="button">
                    <input type="submit" value="Submit" class="btn">
                </div>

            </form>

        </div>
    </section>
</body>

</html>
<script>
    $('#summernote').summernote({
      placeholder: 'Hello Bootstrap 4',
      tabsize: 2,
      height: 100
    });
  </script>

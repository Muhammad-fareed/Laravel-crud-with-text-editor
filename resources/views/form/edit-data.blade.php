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
            @php
                $mood=json_decode($data_id->mood);

            @endphp

            <form action="{{ route('update.data',$data_id) }}" method="post" class="form1">
                @csrf @method('PUT')
                <div class="form-description">
                    <p>Tell us something positive that happaned to you today.</p>
                </div>
                <div class="block">
                    <div>
                        <div class="form-label input-label">
                            <label for="">Name</label>
                        </div>
                        <div class="form-input ">
                            <input type="text" name="name" value="{{ $data_id->name }}"
                                placeholder="  Enter your name" class="input-style">
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
                        <input type="email" value="{{ $data_id->email }}" name="email"
                            placeholder="  Enter your email address" class="input-style">
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
                        <input type="number" value="{{ $data_id->number }}" name="number"
                            placeholder="  Enter a number between 1 and 10" class="input-style">
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
                            <option value="">Select an option.</option>
                            @foreach ($data_all as $data_single)
                                <option value="{{ $data_single->place }}" {{ $data_single->id == $data_id->id ? 'selected' : '' }}>
                                    {{ $data_single->place }}
                                </option>
                            @endforeach
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
                            <input type="radio" name="time" value="Morning" {{$data_id->time=='Morning'?'checked':''}}>
                            <label for="">Morning</label>
                        </div>
                        <div>
                            <input type="radio" name="time" value="Afternoon" {{$data_id->time=='Afternoon'?'checked':''}}>
                            <label for="">Afternoon</label>
                        </div>
                        <div>
                            <input type="radio" name="time" value="Evening" {{$data_id->time=='Evening'?'checked':''}}>
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
                            <input type="checkbox" name="mood" value="Excited" {{in_array('Excited',$mood)?'checked':''}}>
                            <label for="">Excited</label>
                        </div>
                        <div>
                            <input type="checkbox" name="mood[]" value="Humbeled" {{in_array('Humbeled',$mood)=='[Humbeled]'?'checked':''}}>
                            <label for="">Humbeled</label>
                        </div>
                        <div>
                            <input type="checkbox" name="mood[]" value="Elated" {{in_array('Elated',$mood)=='[Elated]'?'checked':''}}>
                            <label for="">Elated</label>
                        </div>
                        <div>
                            <input type="checkbox" name="mood[]" value="Loved" {{in_array('Loved',$mood)=='Loved'?'checked':''}}>
                            <label for="">Loved</label>
                        </div>
                        <div>
                            <input type="checkbox" name="mood[]" value="Enthusiastic" {{in_array('Enthusiastic',$mood)?'checked':''}}>
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
                        <textarea name="experience" id="summernote" class="form-textarea">{{$data_id->experience}}</textarea>
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

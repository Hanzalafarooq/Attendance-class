@extends('main')
@section('main-section')


    <main>

        <div class="login-box">
            <form action="{{ url('/update_enrolled/' . $recordId) }}" method="post">
                @csrf
                <div class="container">
                    <h2>Update Students</h2>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="" class="form-label text-white">Students</label>
                                <select class="form-select form-select-lg" name="student" id="">
                                    <option selected value="{{ $student->id }}">{{ $student->first_name }} {{ $student->last_name }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="" class="form-label text text-white">Classes</label>
                                <select class="form-select form-select-lg" name="class" id="">
                                    @foreach ($classes as $class)
                                        @if ($class->id == $record->class_id)
                                            <option selected value="{{ $class->id }}">{{ $class->name }}</option>
                                        @else
                                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="csid" value="{{ $recordId }}">
                    <input type="submit" value="Submit" name="sub">
                </div>
            </form>
        </div>
    </main>
@endsection






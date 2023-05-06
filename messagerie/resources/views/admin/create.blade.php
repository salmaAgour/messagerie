@extends('layouts.adminLayout')

@section('title', 'كتابة رسالة جديدة')

@section('content')

    <h2 style="margin-right:150px"> كتابة رسالة جديدة </h2>

    <br>

    <div class="d-flex justify-content-center p-2 m-2">
        <div class="card p-4 w-50 mssg">
            <form action={{ Route('storeA') }} method="post" id="myForm">
                @csrf
                <div id='inputs'>
                    <div class="row mb-3">
                        <label for="" class="col-md-3 col-form-label text-md-end"> عنوان الوثيقة </label>
                        <div class="col">
                            <input type="text" name="Lib_Doc[]" class="form-control row-input">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for=""class="col-md-3 col-form-label text-md-end"> عدد الصفحات </label>
                        <div class="col">
                            <input type="number" min="1" oninput="validity.valid||(value='');" name="Pages[]"
                                class="form-control row-input">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for=""class="col-md-3 col-form-label text-md-end"> عدد النسخ </label>
                        <div class="col">
                            <input type="number" min='1' oninput="validity.valid||(value='');" name="Copies[]"
                                class="form-control row-input">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for=""class="col-md-3 col-form-label text-md-end"> المصلحة </label>
                        <div class="col">
                            <select name="Lib_Serv[]" class="form-select row-input">
                                <option value="" disabled selected>--</option>
                                @foreach ($services as $s)
                                    <option value="{{ $s->Lib_Serv }}">{{ $s->Lib_Serv }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>

                <div class="d-flex justify-content-end">
                    <input type="button" class='plus btn fw-bold fs-5 text-white'
                        style="border-radius:45%;background-color:orange" id="plus" value="+" />
                </div>

                <div class="my-2 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary w-25"> إرسال </button>
                    <button type="submit" class="btn btn-primary w-25" onclick="printDocument()"> طباعة </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#plus').click(function() {
                var newRow = $('<br/>' +
                    '<div class="row mb-3">' +
                    '<label for="" class="col-md-3 col-form-label text-md-end">عنوان الوثيقة</label>' +
                    '<div class="col">' +
                    '<input type="text" name="Lib_Doc[]" class="form-control">' +
                    '</div>' +
                    '</div>' +
                    '<div class="row mb-3">' +
                    '<label for=""class="col-md-3 col-form-label text-md-end"> عدد الصفحات </label>' +
                    '<div class="col">' +
                    '<input type="number" min="1" oninput="validity.valid||(value=``);" name="Pages[]" class="form-control">' +
                    '</div>' +
                    '</div>' +
                    '<div class="row mb-3">' +
                    '<label for=""class="col-md-3 col-form-label text-md-end"> عدد النسخ </label>' +
                    '<div class="col">' +
                    '<input type="number" min="1" oninput="validity.valid||(value=``);" name="Copies[]" class="form-control">' +
                    '</div>' +
                    '</div>' +
                    '<div class="row mb-3">' +
                    '<label for=""class="col-md-3 col-form-label text-md-end"> المصلحة </label>' +
                    '<div class="col">' +
                    '<select name="Lib_Serv[]" class="form-select row-input">' +
                    '<option value="" disabled selected>--</option>' +
                    '@foreach ($services as $s)' +
                    '<option value = "{{ $s->Lib_Serv }}" > {{ $s->Lib_Serv }} </option>' +
                    '@endforeach' +
                    '</select>' +
                    '</div>' +
                    '</div>');

                $('#inputs').append(newRow);
                addRowBtn.disabled = true;
            });
        });
        const addRowBtn = document.querySelector('#plus');
        addRowBtn.disabled = true;

        const rowsContainer = document.querySelector('#inputs');

        rowsContainer.addEventListener('change', (event) => {
            const allInputs = rowsContainer.querySelectorAll('.row-input');
            let allFilled = true;
            allInputs.forEach((input) => {
                if (input.value.trim() === '') {
                    allFilled = false;
                }
            });
            addRowBtn.disabled = !allFilled;
        });
    </script>
    <script>
        function printDocument() {
            var documentContent = '<html><head><title>Print Document</title></head><body><h1>hi</h1></body></html>';
            var windowContent = '<html><head><title>Print Document</title></head><body>' + documentContent + '</body></html>';
            var printWindow = window.open('', '', 'height=600,width=800');
            printWindow.document.write(windowContent);
            printWindow.document.close();
            printWindow.print();
            printWindow.close();
        }
    </script>
@endsection

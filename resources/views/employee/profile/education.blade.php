
@extends('layout.employee.employee')

@section('title', 'Education')

@section('content')

<div class="card shadow-sm mt-4">

    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">
            <i class="fas fa-graduation-cap"></i> Educational Qualifications
        </h5>

        <button type="button" class="btn btn-primary btn-sm" id="addEducationRow">
            <i class="fas fa-plus"></i> Add Qualification
        </button>
    </div>

    <div class="card-body">

        <form id="educationForm">
            @csrf

            <div id="educationContainer">

                <div class="education-item border rounded p-3 mb-3">

                    <div class="row">

                        <div class="col-md-4 mb-3">
                            <label>Qualification</label>
                            <input type="text" name="qualification[]" class="form-control">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Institute</label>
                            <input type="text" name="institution[]" class="form-control">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Board / University</label>
                            <input type="text" name="board[]" class="form-control">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Passing Year</label>
                            <input type="number" name="passing_year[]" class="form-control">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Percentage / CGPA</label>
                            <input type="text" name="percentage[]" class="form-control">
                        </div>

                        <div class="col-md-4 d-flex align-items-end mb-3">

                            <button type="button"
                                    class="btn btn-danger removeRow w-100">
                                <i class="fas fa-trash"></i> Remove
                            </button>

                        </div>

                    </div>

                </div>

            </div>

            <div class="text-end">

                <button class="btn btn-success" id="saveEducation">

                    <i class="fas fa-save"></i>
                    Save Education

                </button>

            </div>

        </form>

    </div>

</div>
@endsection

@push('scripts')

<script>

$(function(){

    $('#addEducationRow').click(function(){

        let row = $('.education-item:first').clone();

        row.find('input').val('');

        $('#educationContainer').append(row);

    });

    $(document).on('click','.removeRow',function(){

        if($('.education-item').length>1){

            $(this).closest('.education-item').remove();

        }

    });

    $('#educationForm').submit(function(e){

        e.preventDefault();

        Swal.fire({

            title:'Save Education?',

            icon:'question',

            showCancelButton:true,

            confirmButtonText:'Save'

        }).then((result)=>{

            if(result.isConfirmed){

                $.ajax({

                    url:"{{ route('employee.education.store') }}",

                    type:"POST",

                    data:$(this).serialize(),

                    success:function(response){

                        Swal.fire({

                            icon:'success',

                            title:'Success',

                            text:response.message

                        });

                    },

                    error:function(){

                        Swal.fire({

                            icon:'error',

                            title:'Error',

                            text:'Unable to save education.'

                        });

                    }

                });

            }

        });

    });

});

</script>

@endpush
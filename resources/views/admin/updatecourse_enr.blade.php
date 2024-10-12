@extends('layout_admin.master')
@section('content')
<style>
     .body{
    color: #403e3e;
}
.input-groupp-icon input {
    text-align: end;
    padding-right: 4.4em;
}
h4{
    text-align: center;
}

    .bbtn{
        border: none;
    padding: 10px;
    background-color: rgb(16, 153, 16);
    color: white;
    border-radius: 20px;
    }
    .bttn:hover{
        background-color: rgb(16, 153, 16);
        color: white;
        font-size: 17px;
        font-weight: 600;
    }
    select{
        width: 100%;
    }
</style>
<div id="page-wrapper">
            <div class="containerr">
            <form action="{{url('course_enrollments//update',$data->id)}}" method="post" enctype="multipart/form-data">
            @csrf
                      <div class="roww">

                        <h4>تسجيل جديد</h4>

                            <div class="input-groupp">
                            <select name="bimar_training_year_id" id="bimar_training_year_id">
                         <option>اختر السنة التدريبية</option>
                             @foreach ($years as $year)
                             <option value="{{ $year->id}}" {{ $year->id == $data->bimar_training_year_id ? 'selected' : '' }}>
                               {{ $year->tr_year_name }}
                               </option>
                             @endforeach



                        </select>

                            </div>
                            <div class="input-groupp input-groupp-icon">
    <select name="bimar_training_program_id" id="bimar_training_program_id" class="@error('bimar_training_program_id') is-invalid @enderror">
        <option value="">اختر البرنامج التدريبي</option>
        @foreach ($programs as $program)
            <option value="{{ $program->id }}" {{ $program->id == $data->bimar_training_program_id ? 'selected' : '' }}>
                {{ $program->tr_program_name_ar }}
            </option>
        @endforeach
    </select>
</div>

<div class="input-groupp input-groupp-icon">
    <select id="bimar_training_course_id" name="bimar_training_course_id" class="form-control @error('bimar_training_course_id') is-invalid @enderror">
        @if($my_course)
            <option value="{{ $my_course->id }}" selected>{{ $my_course->tr_course_name_ar }}</option>
        @else
            <option value="">-- اختر الكورس التدريبي --</option>
        @endif
    </select>
</div>





                        <div class="input-groupp input-groupp-icon">
                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                          <input type="number" placeholder="رقم(ترتيب) الدورة التدريبية" name="tr_course_enrol_arrangement" value="{{$data-> tr_course_enrol_arrangement}}"/>

                        </div>
                        <div class="input-groupp input-groupp-icon">
                          <input type="number" placeholder="نسبة الحسم على الدورة" name="tr_course_enrol_discount" value="{{$data-> tr_course_enrol_discount}}"/>
                          <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                        </div>
                        <div class="input-groupp input-groupp-icon">
                            <input type="text" placeholder="الوصف" name="tr_course_enrol_desc" value="{{$data-> tr_course_enrol_desc}}"/>
                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                          </div>

                        <div class="input-groupp input-groupp-icon">
                        <h4>تاريخ بداية التسجيل </h4>
                          <input type="date" placeholder="تاريخ بداية التسجيل" style="padding-bottom: 0;" name="tr_course_enrol_reg_start_date" value="{{$data-> tr_course_enrol_reg_start_date}}"/>
                          <div class="input-icon"><i class="fa-solid fa-calendar-days"></i></div>
                        </div>
                        <div class="input-groupp input-groupp-icon">
                        <h4>تاريخ نهاية التسجيل </h4>
                            <input type="date" placeholder="تاريخ نهاية التسجيل" style="padding-bottom: 0;" name="tr_course_enrol_reg_end_date" value="{{$data-> tr_course_enrol_reg_end_date}}"/>
                            <div class="input-icon"><i class="fa-solid fa-calendar-days"></i></div>
                          </div>
                          <div class="input-groupp input-groupp-icon">
                          <h4>تاريخ بداية الجلسات </h4>
                            <input type="date" placeholder="تاريخ بداية الجلسات" style="padding-bottom: 0;" name="tr_course_enrol_session_start_date" value="{{$data-> tr_course_enrol_session_start_date}}"/>
                            <div class="input-icon"><i class="fa-solid fa-calendar-days"></i></div>
                          </div>
                          <div class="input-groupp input-groupp-icon">
                          <h4>تاريخ نهاية الجلسات </h4>
                            <input type="date" placeholder="تاريخ نهاية الجلسات" style="padding-bottom: 0;" name="tr_course_enrol_session_end_date" value="{{$data-> tr_course_enrol_session_end_date}}"/>
                            <div class="input-icon"><i class="fa-solid fa-calendar-days"></i></div>
                          </div>
                          <div class="input-groupp input-groupp-icon">
                            <input type="number" placeholder="علامة المحصلة النهائية" name="tr_course_enrol_mark" value="{{$data-> tr_course_enrol_mark}}"/>
                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                          </div>
                          <div class="input-groupp input-groupp-icon">
                            <input type="text" placeholder="علامة الامتحان النهائي " name="tr_course_enrol_oralmark" value="{{$data-> tr_course_enrol_oralmark}}"/>
                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                          </div>
                          <div class="input-groupp input-groupp-icon">
                          <input type="text" placeholder="علامة الشفهي  " name="tr_course_enrol_finalmark" value="{{$data-> tr_course_enrol_finalmark}}"/>
                          <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                        </div>
                        <div class="input-groupp input-groupp-icon">
                            <input type="text" placeholder="رسوم التسجيل" name="tr_course_enrol_price" value="{{$data-> tr_course_enrol_price}}"/>
                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                          </div>
                        <div class="input-groupp input-groupp-icon">
                        <select name="bimar_training_type_id" id="bimar_training_type_id">
                         <option>اختر  نوع التدريب</option>
                             @foreach ($types as $type)
                               <option value="{{ $type->id}}" {{ $type->id == $data->bimar_training_type_id ? 'selected' : '' }}>
                               {{ $type->tr_type_name_ar }}
                               </option>

                             @endforeach

                        </select>


                        </div>
                      </div>

                      <div class="roww">
                        <h4>حالة الدورة</h4>

                        <div class="input-groupp">
                        <fieldset class="row mb-3" style="margin-left: 30px;">
                            <div class="col-sm-10">
                               <div >
                                <input  type="radio" name="tr_course_enrol_status" id="gridRadioss1" value="0" {{ old('tr_course_enrol_status', $data->tr_course_enrol_status) == 0 ? 'checked' : '' }}>
                                    <label  for="gridRadioss1">مغلقة </label>
                                    </div>
                                       <div >
                                     <input  type="radio" name="tr_course_enrol_status" id="gridRadioss2" value="1" {{ old('tr_course_enrol_status', $data->tr_course_enrol_status) == 1 ? 'checked' : '' }}>
                                     <label  for="gridRadioss2">مفتوحة للتسجيل</label>
                                        </div>
                                        </div>
                            </fieldset> </div>
                      </div>
                      <div class="roww">
                       <input type="submit" value="حفظ" class="bttn">
                      </div>
                    </form>
              </div>


        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
    console.log("JavaScript is loaded and ready");
    // باقي الكود هنا...
});

$(document).ready(function () {
    function loadCourses(programId, selectedCourseId = null) {
    console.log("Loading courses for program ID:", programId);
    $.ajax({
        url: "{{ route('getcourse') }}",
        type: "get",
        data: { bimar_training_program_id: programId },
        success: function (result) {
            console.log("Courses received:", result);
            $('#bimar_training_course_id').html('<option value="">-- اختر الكورس التدريبي --</option>');
            $.each(result, function (key, value) {
                // استخدم خاصية 'name' بدلاً من 'tr_course_name_ar' لعرض اسم الكورس
                let selected = (value.id == selectedCourseId) ? 'selected' : '';
                $('#bimar_training_course_id').append('<option value="' + value.id + '" ' + selected + '>' + value.name + '</option>');
            });
        },
        error: function (xhr, status, error) {
            console.error("AJAX error:", status, error);
        }
    });
}


    // تحميل الكورسات عند فتح الصفحة بناءً على البرنامج المخزن
    let programId = "{{ $data->bimar_training_program_id }}";
    let courseId = "{{ $data->bimar_training_course_id }}";
    if (programId) {
        loadCourses(programId, courseId);
    }

    // تحميل الكورسات عند تغيير البرنامج
    $('#bimar_training_program_id').on('change', function () {
        let programId = this.value;
        loadCourses(programId);
    });
});
</script>


@endsection

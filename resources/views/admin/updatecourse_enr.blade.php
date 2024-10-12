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
    <select name="bimar_training_program_id" id="bimar_training_program_id" class="@error('bimar_training_program_id') is-invalid @enderror" aria-label="Default select example">
        <option selected>اختر البرنامج التدريبي</option>

        {{-- <option value="">--  اختر البرنامج التدريبي --</option> --}}
  <option value="{{ $my_program->id }}" {{$my_program->id == $my_program->bimar_training_program_id ? 'selected' : ''}}>{{ $my_program->tr_program_name_ar }}</option>

            @foreach ($programs as $program)
                <option value="{{ $program->id }}" {{ $program->id == $data->bimar_training_program_id ? 'selected' : '' }}>{{ $program->tr_program_name_ar }}</option>
            @endforeach
    </select>
</div>

<div class="input-groupp input-groupp-icon">
    <select id="bimar_training_course_id" name="bimar_training_course_id" class="form-control @error('bimar_training_course_id') is-invalid @enderror">

        {{-- <option value="">-- اختر الكورس التدريبي --</option> --}}
  <option value="{{ $my_course->id }}" {{$my_course->id == $my_course->bimar_training_course_id ? 'selected' : ''}}>{{ $my_course->tr_course_name_ar }}</option>

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
                          <input id="qcard" type="radio" name="tr_course_enrol_status" value="1" />
                          <label for="qcard"><span><i class="fa-solid fa-check"></i>مفتوحة للتسجيل</span></label>
                          <input id="qpaypal" type="radio" name="tr_course_enrol_status" value="0"/>
                          <label for="qpaypal"> <span><i class="fa-solid fa-xmark"></i>مغلقة </span></label>
                        </div>
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
    $('#bimar_training_program_id').on('change', function () {
        var programId = $(this).val();
        $("#bimar_training_course_id").html('<option value="">-- اختر الكورس التدريبي --</option>');

        if (programId) {
            $.ajax({
                url: "{{ route('getcourse') }}",
                type: "GET",
                data: { bimar_training_program_id: programId },
                success: function (result) {
                    $.each(result, function (key, value) {
                        $("#bimar_training_course_id").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error("حدث خطأ: " + error);
                    alert("لم يتم جلب الكورسات. تحقق من المسار أو الكود.");
                }
            });
        }
    });

});
$(document).ready(function () {
        function loadcourses(programid, selectedcourseId = null) {
            $.ajax({
                url: "{{ route('getcourse') }}?bimar_training_program_id=" + programid,
                type: "get",
                success: function (result) {
                    $('#bimar_training_course_id').html('<option value="">-- اختر الكورس التدريبي --</option>');
                    $.each(result, function (key, value) {
                        let selected = (value.id == selectedcourseId) ? 'selected' : '';
                        $('#bimar_training_course_id').append('<option value="' + value.id + '" ' + selected + '>' + value.tr_course_name_ar + '</option>');
                    });
                    if (selectedcourseId) {
                        $('#bimar_training_course_id').trigger('change');
                    }
                }
            });
        }



// تحميل البيانات عند فتح الصفحة
        let programid = "{{ $data->bimar_training_program_id }}";



        if (programid) {
            loadRegions(programid, regionId);
        }



        // تحميل البيانات عند تغيير المدينة
        $('#bimar_training_program_id').on('change', function () {
            var programid = this.value;
            loadcourses(programid);
        });

        // تحميل البيانات عند تغيير المنطقة
        
    });

</script>

@endsection

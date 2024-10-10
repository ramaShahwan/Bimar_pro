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
            <form action="{{url('cours_enrollments/store')}}" method="post" enctype="multipart/form-data">
            @csrf
                      <div class="roww">

                        <h4>تسجيل جديد</h4>

                            <div class="input-groupp">
                            <select name="bimar_training_year_id" id="bimar_training_year_id">
                         <option>اختر السنة التدريبية</option>
                             @foreach ($years as $year)
                               <option value="{{ $year->bimar_training_year_id }}">{{ $year->tr_year_name }}</option>
                             @endforeach
                        </select>

                            </div>
                            <div class="input-groupp input-groupp-icon">
                            <select class=" @error('bimar_training_program_id') is-invalid @enderror" name="bimar_training_program_id" id="bimar_training_program_id" aria-label="Default select example" >
        <option selected> اختر البرنامج التدريبي</option>
        @foreach ($programs as $program)
  <option value="{{ $program->bimar_training_program_id }}">{{ $program->tr_program_name_ar }}</option>
  @endforeach
</select>


                            </div>
                            <div class="input-groupp input-groupp-icon">
                            <select id="bimar_training_course_id" name="bimar_training_course_id" class="form-control @error('bimar_training_course_id') is-invalid @enderror" >
                        <option value="">-- اختر الكورس التدريبي --</option>
                        </select>


                            </div>

                        <div class="input-groupp input-groupp-icon">
                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                          <input type="number" placeholder="رقم(ترتيب) الدورة التدريبية" name="tr_course_enrol_arrangement"/>

                        </div>
                        <div class="input-groupp input-groupp-icon">
                          <input type="number" placeholder="نسبة الحسم على الدورة" name="tr_course_enrol_discount"/>
                          <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                        </div>
                        <div class="input-groupp input-groupp-icon">
                            <input type="text" placeholder="الوصف" name="tr_course_enrol_desc"/>
                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                          </div>

                        <div class="input-groupp input-groupp-icon">
                        <h4>تاريخ بداية التسجيل </h4>
                          <input type="date" placeholder="تاريخ بداية التسجيل" style="padding-bottom: 0;" name="tr_course_enrol_reg_start_date"/>
                          <div class="input-icon"><i class="fa-solid fa-calendar-days"></i></div>
                        </div>
                        <div class="input-groupp input-groupp-icon">
                        <h4>تاريخ نهاية التسجيل </h4>
                            <input type="date" placeholder="تاريخ نهاية التسجيل" style="padding-bottom: 0;" name="tr_course_enrol_reg_end_date"/>
                            <div class="input-icon"><i class="fa-solid fa-calendar-days"></i></div>
                          </div>
                          <div class="input-groupp input-groupp-icon">
                          <h4>تاريخ بداية الجلسات </h4>
                            <input type="date" placeholder="تاريخ بداية الجلسات" style="padding-bottom: 0;" name="tr_course_enrol_session_start_date"/>
                            <div class="input-icon"><i class="fa-solid fa-calendar-days"></i></div>
                          </div>
                          <div class="input-groupp input-groupp-icon">
                          <h4>تاريخ نهاية الجلسات </h4>
                            <input type="date" placeholder="تاريخ نهاية الجلسات" style="padding-bottom: 0;" name="tr_course_enrol_session_end_date"/>
                            <div class="input-icon"><i class="fa-solid fa-calendar-days"></i></div>
                          </div>
                          <div class="input-groupp input-groupp-icon">
                            <input type="number" placeholder="علامة المحصلة النهائية" name="tr_course_enrol_mark"/>
                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                          </div>
                          <div class="input-groupp input-groupp-icon">
                            <input type="text" placeholder="علامة الامتحان النهائي " name="tr_course_enrol_oralmark"/>
                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                          </div>
                          <div class="input-groupp input-groupp-icon">
                          <input type="text" placeholder="علامة الشفهي  " name="tr_course_enrol_finalmark"/>
                          <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                        </div>
                        <div class="input-groupp input-groupp-icon">
                            <input type="text" placeholder="رسوم التسجيل" name="tr_course_enrol_price"/>
                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                          </div>
                        <div class="input-groupp input-groupp-icon">
                        <select name="bimar_training_type_id" id="bimar_training_type_id">
                         <option>اختر  نوع التدريب</option>
                             @foreach ($types as $type)
                               <option value="{{ $type->bimar_training_type_id }}">{{ $type->tr_year_name }}</option>
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
    $('#tbimar_training_program_id').on('change', function () {
        var bimartrainingprogramid = this.value;
        $("#bimar_training_course_id").html(''); // تفريغ قائمة الكورسات قبل الجلب
        $.ajax({
            url: "{{ route('getcourse') }}?bimar_training_program_id=" + bimartrainingprogramid,
            type: "GET",
            success: function (result) {
                $('#bimar_training_course_id').html('<option value="">-- اختر الكورس التدريبي --</option>');
                $.each(result, function (key, value) {
                    $("#bimar_training_course_id").append('<option value="' + value.id + '">' + value.name + '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.error("حدث خطأ: " + error);
                alert("لم يتم جلب الكورسات. تحقق من المسار أو الكود.");
            }
        });
    });
});


@endsection
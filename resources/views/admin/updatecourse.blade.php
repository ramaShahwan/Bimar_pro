@extends('layout_admin.master')
@section('content')
<div id="page-wrapper">
            <div class="containerr">
            <form action="  {{url('region/update',$data->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="tr_course_id" value="{{ $call->tr_course_id }}">

              <div class="roww">
                        <h4> تعديل الدورة</h4>
                        <div class="input-groupp input-groupp-icon">
                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                          <input type="text" placeholder="رمز الدورة " value="{{ $call->tr_course_code }}" name="tr_course_code" id="tr_course_code"/>

                        </div>
                        <div class="input-groupp input-groupp-icon">
                          <input type="text" placeholder="الاسم باللغة العربية" value="{{ $call->tr_course_name_ar }}" name="tr_course_name_ar" id="tr_course_name_ar"/>
                          <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                        </div>
                        <div class="input-groupp input-groupp-icon">
                          <input type="text" placeholder="  الاسم باللغة الانكليزية" style="padding-bottom: 0;"value="{{ $call->tr_course_name_en }}" name="tr_course_name_en" id="tr_course_name_en"/>
                          <div class="input-icon"><i class="fa-solid fa-calendar-days"></i></div>
                        </div>
                        <div class="">
                        <img id="current_course_img" src="" style="display: none; " alt="Current course Image" class="bg-img" height="170px" width="170px">

                            <!-- <img src="{{URL::asset('/img/program/'.$call->tr_program_img)}}" alt="" class="bg-img" height="170px" width="170px"> -->
                            <input type="file" placeholder="الصورة" style="padding-bottom: 0;" name="tr_course_img" id="tr_course_img"/>
                            <!-- <div class="input-icon"><i class="fa-solid fa-calendar-days"></i></div> -->
                          </div>
                      </div>

                      <div class="roww">
                        <h4>حالة الدورة</h4>
                        <div class="input-groupp">
                        <fieldset class="row mb-3" style="margin-left: 30px;">
                            <div class="col-sm-10">
                               <div >
                                <input  type="radio" name="tr_course_status" id="gridRadioss1" value="0" {{ old('tr_course_status', $call->tr_course_status) == 0 ? 'checked' : '' }}>
                                    <label  for="gridRadioss1">غير فعال</label>
                                    </div>
                                       <div >
                                     <input  type="radio" name="tr_course_status" id="gridRadioss2" value="1" {{ old('tr_course_status', $call->tr_course_status) == 1 ? 'checked' : '' }}>
                                     <label  for="gridRadioss2">فعال</label>
                                        </div>
                                        </div>
                            </fieldset> </div>
                        <h4>هل الدورة التدريبية هي دوبلوم تدريبي؟ </h4>
                        <div class="input-groupp">
                        <fieldset class="row mb-3" style="margin-left: 30px;">
                            <div class="col-sm-10">
                               <div >
                                <input  type="radio" name="tr_is_diploma" id="gridRadios1" value="0" {{ old('tr_is_diploma', $call->tr_is_diploma) == 0 ? 'checked' : '' }}>
                                    <label  for="gridRadios1">غير فعال</label>
                                    </div>
                                       <div >
                                     <input  type="radio" name="tr_is_diploma" id="gridRadios2" value="1" {{ old('tr_is_diploma', $call->tr_is_diploma) == 1 ? 'checked' : '' }}>
                                     <label  for="gridRadios2">فعال</label>
                                        </div>
                                        </div>
                            </fieldset> </div>
                        <div class="input-groupp input-groupp-icon">
                          <input type="text" placeholder="الوصف" value="{{ $call->tr_course_desc }}" name="tr_course_desc" id="tr_course_desc"/>
                          <div class="input-icon"><i class="fa-solid fa-audio-description"></i></div>
                        </div>
                        <div class="input-groupp">
                        <select name="tr_course_program_id">
                         <!-- <option>اختر السنة التدريبية</option> -->
                         @foreach ($programs as $program)
                         <!-- <option value="{{ $program->tr_program_id }}">{{ $program->tr_program_name_ar }}</option> -->

                        <option value="{{ $program->tr_program_id }}" {{ $program->tr_program_id == $call->tr_program_id ? 'selected' : '' }}>
                            {{ $program->tr_program_name_ar }}
                        </option>
                    @endforeach
                        </select>


                            </div>


                      </div>
                      <div class="roww">
                       <input type="submit" value="حفظ" class="bttn">
                      </div>
                    </form>
              </div>


        </div>
@endsection

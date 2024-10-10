@extends('layout_admin.master')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
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
    .popup .overlay{
            position: fixed;
            top: 0px;
            left: 0px;
            width: 100vw;
            height: 100vw;
            background: rgba(0, 0, 0, 0.7);
            z-index: 1;
            display: none;
        }
        .popup .content{
            /* position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%) scale(0);

            width: 450px;
            height: 220px;
            z-index: 2;
            text-align: center;
            padding: 20px;
            box-sizing: border-box; */
            max-width: 38em;
    padding: 1em 3em 2em 3em;
    /* margin: 0em auto; */
    background-color: #fff;
    /* border-radius: 4.2px; */
    /* box-shadow: 0px 3px 10px -2px rgba(0, 0, 0, 0.2); */
    position: absolute;
    top: 70%;
    left: 50%;
    transform: translate(-50%, -50%) scale(0);
    background: #fff;
    width: 450px;
    /* height: 220px; */
    z-index: 2;
    text-align: center;
    padding: 20px;
    box-sizing: border-box;

        }
        .popup .close-btn{
            cursor: pointer;
            position: absolute;
            right: 20px;
            top: 20px;
            width: 30px;
            height: 30px;
            background: #222;
            color: #fff;
            font-size: 25px;
            font-weight: 600;
            line-height: 30px;
            text-align: center;
            border-radius: 50%;
        }
        .popup.active .overlay{
            display: block;
        }
        .popup.active .content{
            transition: all 300ms ease-in-out;
            transform: translate(-50%,-50%) scale(1);

        }
    .card {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0, 0, 0, .125);
    border-radius: .25rem;
}
.row {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
}
.card-header {
    padding: .75rem 1.25rem;
    margin-bottom: 0;
    background-color: rgba(0, 0, 0, .03);
    border-bottom: 1px solid rgba(0, 0, 0, .125);
}
.table td, .table th {
    text-align: center;
    font-size: 17px;
    padding: .75rem !important;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
}


          /* شكل المفتاح */
          .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        /* شريط الخلفية */
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        /* اللون الأخضر عند التفعيل */
        input:checked + .slider {
            background-color: green;
        }

        /* تحريك الزر عند التفعيل */
        input:checked + .slider:before {
            transform: translateX(26px);
        }

input[type="radio"]:checked + label,
input:checked + label:active {
  /* background-color: #f0a500; */
  background-color: rgb(16, 153, 16);
  color: #fff;
  /* border-color: #bd8200; */
  border-color: rgb(16, 153, 16);
}
body{
    color: #403e3e;
}
.input-groupp-icon input {
    text-align: end;
    padding-right: 4.4em;
}

</style>



        <!-- /. NAV SIDE  -->
    <div id="page-wrapper">
    @if(session()->has('message'))
        <div class="alert alert-info" role="alert" style="text-align:end;font-size: 20px; ">
          {{session()->get('message')}}
        </div>
@endif
        <div class="row" style="    margin: 80px 30px; direction: rtl;">
            <div class="col-lg-12">
                <div class="card">
                        <div class="card-header" style="text-align: start;font-size: 20px;display: flex;justify-content: space-between;align-items: center;">
                            <h3><i class="fa-sharp fa-solid fa-calendar-week"></i>  دورة تدريبية</h3>
                            <!-- <a href="add.html" style="background: #007bff;padding: 6px;color: white;"><i class="las la-user-plus"></i> مدرب جديد</a> -->
                            <button onclick="togglePopuo()" class="bbtn"> اضافة دورة</button>
                        </div>
                    <div class="card-block">
                        <table class="table table-bordered table-striped table-condensed">
                            <thead style="text-align: center;">
                                <tr>
                                    <th>رمز الدورة</th>
                                    <th>الاسم باللغة العربية</th>
                                    <th>الاسم باللغة الانكليزية</th>
                                    <th>صورة</th>
                                    <th>الحالة</th>
                                    <th>دوبلوم</th>
                                    <th>الوصف</th>
                                    <th>البرنامج</th>
                                    <th>الأحداث</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: center;">
                            @foreach($data as $call)
                                <tr>
                                    <td>{{$call->tr_course_code}} </td>
                                    <td>{{$call->tr_course_name_ar}}</td>
                                    <td>{{$call->tr_course_name_en}}</td>
                                    <td><img src="{{URL::asset('/img/course/'.$call->tr_course_img)}}" alt="" class="bg-img" height="40px" width="40px"></td>
                                    <td>   <a href=" course/{{$call->id}}" class="btn btn-sm btn-{{$call->tr_course_status ? 'success' : 'danger'}}">
    {{$call->tr_course_status ? 'فعالة' : 'غير فعالة'}}
</a></td>
<td>{{ $call->tr_is_diploma == 1 ? 'نعم' : 'لا' }}</td>
                                      <td>{{$call->tr_course_desc}} </td>
                                      <td>{{ $call->bimar_training_program->tr_program_name_ar ?? 'اسم غير متاح' }}</td>

                                    <td>
                                        <!-- <a href=""><span class="las la-trash-alt" style="font-size: 30px; color: #f00707;"></span></a> -->
                                        <a href="{{url('course/edit',$call->id)}}"><span class="las la-edit" style="font-size: 30px; color: #3f4046;"></span></a>
                                        <!-- <button onclick="togglePopuoo()" style="border: none;background: none;"><span class="las la-edit" style="font-size: 30px; color: #3f4046;"></span> </button> -->
                                        <!-- <button onclick="showEditPopup({{ $call->tr_course_id }})" style="border: none; background: none;">
    <span class="las la-edit" style="font-size: 30px; color: #3f4046;"></span>
</button> -->
<!-- <button onclick="showEditPopup({{ $call->tr_program_id }})" style="border: none;background: none;"><span class="las la-edit" style="font-size: 30px; color: #3f4046;"></span></button> -->


                                        <!-- <a href="show.html"><span class="las la-eye" style="font-size: 30px; color: #1cda55;"></span></a> -->
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <!-- <nav>
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">Prev</a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">4</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav> -->
                    </div>
                </div>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <div class="popup" id="popup-1">
            <div class="overlay"></div>
            <div class="content">
                <div class="close-btn" onclick="togglePopuo()">&times;</div>
                <!-- <div class="containerr"> -->
                <form action="{{url('course/store')}}" method="post" enctype="multipart/form-data">
                @csrf
                      <div class="roww">
                        <h4>دورة جديدة</h4>
                        <div class="input-groupp input-groupp-icon">
                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                          <input type="text" placeholder="رمز الدورة" name="tr_course_code" id="tr_course_code"/>

                        </div>
                        <div class="input-groupp input-groupp-icon">
                          <input type="text" placeholder="الاسم باللغة العربية" name="tr_course_name_ar" id="tr_course_name_ar"/>
                          <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                        </div>
                        <div class="input-groupp input-groupp-icon">
                          <input type="text" placeholder=" الاسم باللغة الانكليزية" style="padding-bottom: 0;" name="tr_course_name_en" id="tr_course_name_en"/>
                          <div class="input-icon"><i class="fa-solid fa-calendar-days"></i></div>
                        </div>
                        <div class="input-groupp input-groupp-icon">
                            <input type="file" placeholder="الصورة  " style="padding-bottom: 0;" name="tr_course_img" id="tr_course_img"/>
                            <div class="input-icon"><i class="fa-solid fa-calendar-days"></i></div>
                          </div>
                      </div>

                      <div class="roww">
                        <h4>حالة الدورة</h4>
                        <div class="input-groupp">
                          <input id="payment-method-card" type="radio" name="tr_course_status" value="1" />
                          <label for="payment-method-card"><span><i class="fa-solid fa-check"></i>فعالة</span></label>
                          <input id="payment-method-paypal" type="radio" name="tr_course_status" value="0"/>
                          <label for="payment-method-paypal"> <span><i class="fa-solid fa-xmark"></i>غير فعالة</span></label>
                        </div>
                        <h4>هل الدورة التدريبية هي دوبلوم تدريبي؟ </h4>
                        <div class="input-groupp">
                          <input id="card" type="radio" name="tr_is_diploma" value="1" />
                          <label for="card"><span><i class="fa-solid fa-check"></i>نعم</span></label>
                          <input id="paypal" type="radio" name="tr_is_diploma" value="0"/>
                          <label for="paypal"> <span><i class="fa-solid fa-xmark"></i>لا </span></label>
                        </div>
                        <div class="input-groupp">
                        <select name="bimar_training_program_id">
                         <option>اختر السنة التدريبية</option>
                             @foreach ($programs as $program)
                               <option value="{{ $program->bimar_training_program_id}}">{{ $program->tr_program_name_ar }}</option>
                             @endforeach
                        </select>


                            </div>
                        <div class="input-groupp input-groupp-icon">
                          <input type="text" placeholder="الوصف" name="tr_course_desc" id="tr_course_desc"/>
                          <div class="input-icon"><i class="fa-solid fa-audio-description"></i></div>
                        </div>


                      </div>
                      <div class="roww">
                       <input type="submit" value="حفظ" class="bttn">
                      </div>
                    </form>
                  <!-- </div> -->

            </div>
        </div>


    </div>
    <!-- /. WRAPPER  -->

    <!-- /. FOOTER  -->
    <script>
        function togglePopuo(){
            document.getElementById("popup-1").classList.toggle("active");
        }
        function togglePopuoo(){
            document.getElementById("popuppo-1").classList.toggle("active");
        }
    </script>
    <script>
        // JavaScript to handle toggle switch behavior
    document.querySelectorAll('.toggle-switch input').forEach((toggle) => {
        toggle.addEventListener('change', function() {
            if (this.checked) {
                this.parentElement.parentElement.classList.add('highlight');
            } else {
                this.parentElement.parentElement.classList.remove('highlight');
            }
        });
    });
    //switch
    document.querySelector('input[type="checkbox"]').addEventListener('change', function() {
      if(this.checked) {
        console.log("مفعل");
      } else {
        console.log("غير مفعل");
      }
    });

    </script>
    <script>
       function showEditPopup(id) {
    fetch(`/course/edit/${id}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log('Data received:', data);

            // تعيين قيم الحقول بالبيانات المستلمة
            document.getElementById('tr_course_code').value = data.tr_course_code;
            document.getElementById('tr_course_name_en').value = data.tr_course_name_en;
            document.getElementById('tr_course_name_ar').value = data.tr_course_name_ar;
            document.getElementById('tr_course_desc').value = data.tr_course_desc;

            // إعداد الصورة إذا كانت موجودة
            if (data.tr_course_img) {
                document.getElementById('current_course_img').src = `/img/course/${data.tr_course_img}`;
                document.getElementById('current_course_img').style.display = 'block';
            } else {
                document.getElementById('current_course_img').style.display = 'none';
            }

            // تعيين الحالة
            const statusRadio = document.querySelector(`input[name="tr_course_status"][value="${data.tr_course_status}"]`);
            if (statusRadio) {
                statusRadio.checked = true;
            }

            // عرض النافذة
            togglePopuoo();
        })
        .catch(error => console.error('Error:', error));
}
function updateCourse(event) {
    event.preventDefault();

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    const formData = new FormData();
    formData.append('tr_course_code', document.getElementById('tr_course_code').value);
    formData.append('tr_course_name_en', document.getElementById('tr_course_name_en').value);
    formData.append('tr_course_name_ar', document.getElementById('tr_course_name_ar').value);
    formData.append('tr_course_status', document.querySelector('input[name="tr_course_status"]:checked').value);
    formData.append('tr_course_desc', document.getElementById('tr_course_desc').value);
    formData.append('id', document.querySelector('input[name="id"]').value);
    formData.append('bimar_training_program_id', document.querySelector('select[name="bimar_training_program_id"]').value);
    formData.append('tr_is_diploma', document.querySelector('input[name="tr_is_diploma"]:checked').value);

    const newImage = document.getElementById('tr_course_img').files[0];
    if (newImage) {
        formData.append('tr_course_img', newImage);
    }
    console.log(Array.from(formData.entries()));

    let url = `/course/update/${formData.get('id')}`;

    fetch(url, {
        method: 'POST',
        headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': csrfToken // تضمين توكن CSRF في الرؤوس
    },
        body: formData
    //     body: JSON.stringify({
    //     tr_course_id: courseId,
    //     tr_course_code: courseCode,
    //     tr_course_name_en: courseNameEn,
    //     tr_course_name_ar: courseNameAr,
    //     tr_course_desc: courseDesc,
    //     tr_course_program_id: programId,
    //     tr_is_diploma: isDiploma,
    //     tr_course_status: courseStatus,
    // })
    })
    .then(response => {
        if (response.ok) {
            return response.json(); // قراءة الاستجابة كـ JSON
        } else {
            throw new Error('حدث خطأ في التعديل');
        }
    })
    .then(data => {
        alert(data.message); // عرض رسالة النجاح
        location.reload(); // إعادة تحميل الصفحة لتحديث البيانات
    })
    .catch(error => console.log(error));
}

    </script>
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->

    @endsection

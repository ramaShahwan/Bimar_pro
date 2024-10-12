@extends('layout_admin.master')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    .body{
    color: #403e3e;
}
.input-groupp-icon input {
    text-align: end;
    padding-right: 4.4em;
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
    top: 50%;
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
    top: 50%;
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
        .popupp {
    display: none;
}
.popupp.active {
    display: block;
    opacity: 1;
    z-index: 1000; /* تأكد أن قيمة z-index أعلى من بقية العناصر */
}

        .popupp .overlayy{
            position: fixed;
            top: 0px;
            left: 0px;
            width: 100vw;
            height: 100vw;
            background: rgba(0, 0, 0, 0.7);
            z-index: 1;
            display: none;
        }
        .popupp .contentt{
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
    top: 50%;
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
        .popupp .close-btn{
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
        .popupp.active .overlayy{
            display: block;
        }
        .popupp.active .contentt{
            transition: all 300ms ease-in-out;
            transform: translate(-50%,-50%) scale(1);

        }

          /* .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }


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


        input:checked + .slider {
            background-color: green;
        }


        input:checked + .slider:before {
            transform: translateX(26px);
        } */
         /* شكل الزر */
.switch {
  position: relative;
  display: inline-block;
  width: 50px;
  height: 24px;
}

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
  background-color: #ccc;  /* اللون الافتراضي */
  transition: .4s;
  border-radius: 34px;
}

.slider:before {
  position: absolute;
  content: "";
  height: 20px;
  width: 20px;
  left: 4px;
  bottom: 2px;
  background-color: white;
  transition: .4s;
  border-radius: 50%;
}

/* إذا كان الزر مفعلاً (checked) */
input:checked + .slider {
  background-color: green; /* اللون الأخضر للحالة الفعالة */
}

input:checked + .slider:before {
  transform: translateX(26px);  /* تحريك الزر إلى اليمين */
}


input[type="radio"]:checked + label,
input:checked + label:active {

  background-color: rgb(16, 153, 16);
  color: #fff;

  border-color: rgb(16, 153, 16);
}
.active-row {
    background-color: #d4edda;
}

</style>

<div id="page-wrapper">
@if(session()->has('message'))
        <div class="alert alert-info" role="alert" style="text-align:end;font-size: 20px; ">
          {{session()->get('message')}}
        </div>
@endif
<div class="row body" style="    margin: 80px 30px; direction: rtl;">
            <div class="col-lg-12">
                <div class="card">
                        <div class="card-header" style="text-align: start;font-size: 20px;display: flex;justify-content: space-between;align-items: center;">
                            <h3><i class="fa-sharp fa-solid fa-calendar-week"></i> سنوات</h3>
                            <!-- <a href="add.html" style="background: #007bff;padding: 6px;color: white;"><i class="las la-user-plus"></i> مدرب جديد</a> -->
                            <button onclick="togglePopuo()" class="bbtn">اضافة سنة</button>
                        </div>
                    <div class="card-block">
                        <table class="table table-bordered table-striped table-condensed">
                            <thead style="text-align: center;">
                                <tr>
                                    <th>اسم السنة</th>
                                    <th>السنة</th>
                                    <th>تاريخ بداية السنة </th>
                                    <th>تاريخ نهاية السنة</th>
                                    <th>الحالة</th>
                                    <th>الوصف</th>
                                    <th>الأحداث</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: center;">
                            @foreach($data as $call)
                                <tr>
                                    <td>{{$call->tr_year_name}}</td>
                                    <td>{{$call->tr_year}}</td>
                                    <td>{{$call->tr_year_start_date}}</td>
                                    <td>{{$call->tr_year_end_date}}</td>
                                    <!-- <td>   <label class="switch">

            <input type="checkbox" class="switch-button" data-id="{{ $call->tr_year_id }}" {{ $call->tr_year_status == 1 ? 'checked' : '' }}>
            <span class="slider"></span>
        </label>
</td> -->
<td>   <a href=" year/{{$call->id}}" class="btn btn-sm btn-{{$call->tr_year_status ? 'success' : 'danger'}}">
    {{$call->tr_year_status ? 'فعالة' : 'غير فعالة'}}
</a></td>
                                      <td> {{$call->tr_year_desc}}</td>
                                    <td>
                                        <!-- <a href=""><span class="las la-trash-alt" style="font-size: 30px; color: #f00707;"></span></a> -->
                                        <!-- <a href="update.html"><span class="las la-edit" style="font-size: 30px; color: #3f4046;"></span></a> -->
                                        <!-- <button onclick="togglePopuoo()" style="border: none;background: none;"><span class="las la-edit" style="font-size: 30px; color: #3f4046;"></span> </button> -->
                                        <!-- <button onclick="showEditPopup({{ $call->tr_year_id }})" style="border: none;background: none;">
            <span class="las la-edit" style="font-size: 30px; color: #3f4046;"></span>
        </button> -->
        <!-- <button onclick="showEditPopup({{ $call->tr_year_id }})" style="border: none;background: none;"><span class="las la-edit" style="font-size: 30px; color: #3f4046;"></span></button> -->
        <button onclick="showEditPopup({{ $call->id }})" style="border: none;background: none;"><span class="las la-edit" style="font-size: 30px; color: #3f4046;"></span></button>



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
                    <form action="{{url('year/store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                      <div class="roww">

                        <h4>سنة جديدة</h4>
                        <div class="input-groupp input-groupp-icon">
                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                          <input type="text" placeholder="اسم السنة" name="tr_year_name" class="@error('tr_year_name') is-invalid @enderror"/>
                          @error('tr_year_name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="input-groupp input-groupp-icon">
                          <input type="number" placeholder="السنة" name="tr_year" class="@error('tr_year') is-invalid @enderror"/>
                          <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                          @error('tr_year')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="input-groupp input-groupp-icon">
                          <input type="date" placeholder="تاريخ بداية السنة" style="padding-bottom: 0;" name="tr_year_start_date" class="@error('tr_year_start_date') is-invalid @enderror"/>
                          <div class="input-icon"><i class="fa-solid fa-calendar-days"></i></div>
                          @error('tr_year_start_date')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="input-groupp input-groupp-icon">
                            <input type="date" placeholder="تاريخ نهاية السنة" style="padding-bottom: 0;" name="tr_year_end_date" class="@error('tr_year_end_date') is-invalid @enderror"/>
                            <div class="input-icon"><i class="fa-solid fa-calendar-days"></i></div>
                            @error('tr_year_end_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                          </div>
                      </div>

                      <div class="roww">
                        <h4>حالة السنة</h4>
                        <div class="input-groupp">

                          <input id="payment-method-paypal" type="radio" name="tr_year_status" value="0"/>
                          <label for="payment-method-paypal"> <span><i class="fa-solid fa-xmark"></i>غير فعالة</span></label>
                          <input id="payment-method-card" type="radio" name="tr_year_status" value="1" />
                          <label for="payment-method-card"><span><i class="fa-solid fa-check"></i>فعالة</span></label>
                        </div>
                        <div class="input-groupp input-groupp-icon">
                          <input type="text" placeholder="الوصف" name="tr_year_desc"/>
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
        <div class="popupp" id="popuppo-1">
    <div class="overlayy"></div>
    <div class="contentt">
        <div class="close-btn" onclick="togglePopuoo()">&times;</div>
        @if(isset($call))
        <form id="editForm" onsubmit="updateYear(event, {{ $call->id }})">
            @csrf
            <input type="hidden" name="id" value="{{ $call->id }}">

            <div class="roww">
                <h4>تعديل السنة</h4>
                <div class="input-groupp input-groupp-icon">
                    <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                    <input type="text" id="tr_year_name" name="tr_year_name" value="{{ $call->tr_year_name }}" class="@error('tr_year_name') is-invalid @enderror">
                    @error('tr_year_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>

                <div class="input-groupp input-groupp-icon">
                    <input type="number" name="tr_year" id="tr_year" value="{{ $call->tr_year }}" class="@error('tr_year') is-invalid @enderror"/>
                    <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                    @error('tr_year')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>

                <div class="input-groupp input-groupp-icon">
                    <input type="date" name="tr_year_start_date" id="tr_year_start_date" placeholder="تاريخ بداية السنة" style="padding-bottom: 0;" value="{{ $call->tr_year_start_date }}" class="@error('tr_year_start_date') is-invalid @enderror"/>
                    <div class="input-icon"><i class="fa-solid fa-calendar-days"></i></div>
                    @error('tr_year_start_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>

                <div class="input-groupp input-groupp-icon">
                    <input type="date" name="tr_year_end_date" id="tr_year_end_date" placeholder="تاريخ نهاية السنة" style="padding-bottom: 0;" value="{{ $call->tr_year_end_date }}" class="@error('tr_year_end_date') is-invalid @enderror"/>
                    <div class="input-icon"><i class="fa-solid fa-calendar-days"></i></div>
                    @error('tr_year_end_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
            </div>

            <div class="roww">
                <h4>حالة السنة</h4>
                <div class="input-groupp">
                    <input id="scard" type="radio" name="tr_year_status" value="1" {{ $call->tr_year_status == 1 ? 'checked' : '' }} />
                    <label for="scard"><span><i class="fa-solid fa-check"></i>فعالة</span></label>

                    <input id="apaypal" type="radio" name="tr_year_status" value="0" {{ $call->tr_year_status == 0 ? 'checked' : '' }} />
                    <label for="apaypal"><span><i class="fa-solid fa-xmark"></i>غير فعالة</span></label>
                </div>

                <div class="input-groupp input-groupp-icon">
                    <input type="text" name="tr_year_desc" id="tr_year_desc" placeholder="الوصف" value="{{ $call->tr_year_desc }}" />
                    <div class="input-icon"><i class="fa-solid fa-audio-description"></i></div>
                </div>
            </div>

            <div class="roww">
                <input type="submit" value="حفظ" class="bttn">
            </div>
        </form>
        @else
            <p>لم يتم العثور على بيانات للتعديل</p>
        @endif
    </div>
</div>

</div>


        <!-- /. PAGE WRAPPER  -->

    <!-- /. WRAPPER  -->

    <!-- /. FOOTER  -->
    <script>document.querySelectorAll('.switch-button').forEach(function(switchButton) {
    switchButton.addEventListener('change', function(event) {
        // استخدم event.target للحصول على العنصر الذي تم النقر عليه
        var isChecked = event.target.checked ? 0 : 1; // 1 للمفعل، 0 لغير مفعل
        var itemId = event.target.getAttribute('data-id'); // احصل على قيمة data-id من العنصر

        // تأكد من أن itemId ليس فارغاً
        if (!itemId) {
            console.error("Item ID is missing");
            return;
        }

        // طلب AJAX لتحديث الحالة في الباك
     fetch(`/update-switch/${itemId}`, {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    },
    body: JSON.stringify({
        tr_year_status: isChecked
    })
})

        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();  // تحويل الاستجابة إلى JSON فقط إذا كانت صالحة
        })
        .then(data => {
            if (data.success) {
                console.log('Updated successfully:', data.message);
            } else {
                console.error('Failed to update:', data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});


</script>


    <script>
         function togglePopuo(){
            document.getElementById("popup-1").classList.toggle("active");
        }
        function togglePopuoo(){
            document.getElementById("popuppo-1").classList.toggle("active");
        }


        function showEditPopup(id) {
    fetch(`/years/edit/${id}`)
        .then(response => response.json())
        .then(data => {
            console.log('Data received:', data);

            // تعيين القيم للحقول باستخدام `id`
            document.getElementById('tr_year_name').value = data.tr_year_name;
            document.getElementById('tr_year').value = data.tr_year;
            document.getElementById('tr_year_start_date').value = data.tr_year_start_date;
            document.getElementById('tr_year_end_date').value = data.tr_year_end_date;
            document.getElementById('tr_year_desc').value = data.tr_year_desc;

            // تحديث حالة الراديو لحالة السنة
            document.querySelector(`input[name="tr_year_status"][value="${data.tr_year_status}"]`).checked = true;

            // تعيين المعرف في حقل مخفي
            document.querySelector('input[name="id"]').value = id;

            // إظهار النافذة
            togglePopuoo();
        })
        .catch(error => console.error('Error:', error));
}
function updateYear(event) {
    event.preventDefault(); // منع إعادة تحميل الصفحة

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    const data = {
        tr_year_name: document.getElementById('tr_year_name').value,
        tr_year: document.getElementById('tr_year').value,
        tr_year_start_date: document.getElementById('tr_year_start_date').value,
        tr_year_end_date: document.getElementById('tr_year_end_date').value,
        tr_year_status: document.querySelector('input[name="tr_year_status"]:checked').value, // القيمة هنا تمثل حالة السنة
        tr_year_desc: document.getElementById('tr_year_desc').value,
        id: document.querySelector('input[name="id"]').value // الحصول على المعرف
    };

    let url = `/years/update/${data.id}`; // استخدام المعرف

    fetch(url, {
        method: 'PUT',
        headers: {
            'X-CSRF-TOKEN': csrfToken,
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then(response => {
        if (response.ok) {
            return response.json();
        } else {
            throw new Error('حدث خطأ في التعديل');
        }
    })
    .then(data => {
        alert("تم التعديل بنجاح");
        location.reload(); // إعادة تحميل الصفحة لتحديث البيانات
    })
    .catch(error => console.log(error));
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
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    @endsection

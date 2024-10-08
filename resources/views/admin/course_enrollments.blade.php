@extends('layout_admin.master')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<style>
    select{
        width: 100%;
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
    top: 90%;
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

        <div class="row" style="    margin: 80px 30px; direction: rtl;">
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
                                    <th>السنة التدريبية</th>
                                    <th>البرنامج التدريبي</th>
                                    <th>  الدورة التدريبية </th>
                                    <th>  رقم الدورة</th>
                                    <th>نسبة الحسم</th>
                                    <th>الوصف</th>

                                    <th>الحالة</th>
                                    <th>الأحداث</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: center;">
                                <tr>
                                    <td>2020-2021 </td>
                                    <td>ai </td>
                                    <td>ai </td>
                                    <td>الدورة الاولى </td>
                                    <td>500000 </td>
                                    <td>الدورة جميلة </td>

                                    <td><label class="switch">
                                        <input type="checkbox">
                                        <span class="slider"></span>
                                      </label></td>

                                    <td>
                                        <!-- <a href=""><span class="las la-trash-alt" style="font-size: 30px; color: #f00707;"></span></a> -->
                                        <!-- <a href="update.html"><span class="las la-edit" style="font-size: 30px; color: #3f4046;"></span></a> -->
                                        <button onclick="togglePopuoo()" style="border: none;background: none;"><span class="las la-edit" style="font-size: 30px; color: #3f4046;"></span> </button>
                                        <!-- <a href="show.html"><span class="las la-eye" style="font-size: 30px; color: #1cda55;"></span></a> -->
                                    </td>
                                </tr>

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
                    <form>
                      <div class="roww">

                        <h4>تسجيل جديد</h4>

                            <div class="input-groupp">
                              <select>
                                <option>اختر السنة التدريبية</option>
                                <option>2020</option>
                                <option>2021</option>
                              </select>

                            </div>
                            <div class="input-groupp input-groupp-icon">
                                <select>
                                    <option>اختر البرنامج التدريبي</option>
                                    <option>ai</option>
                                  </select>


                            </div>
                            <div class="input-groupp input-groupp-icon">
                                <select>
                                    <option>اختر الدورة التدريبية</option>
                                    <option>ai</option>
                                  </select>


                            </div>

                        <div class="input-groupp input-groupp-icon">
                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                          <input type="number" placeholder="رقم(ترتيب) الدورة التدريبية" />

                        </div>
                        <div class="input-groupp input-groupp-icon">
                          <input type="number" placeholder="نسبة الحسم على الدورة" />
                          <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                        </div>
                        <div class="input-groupp input-groupp-icon">
                            <input type="text" placeholder="الوصف" />
                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                          </div>

                        <div class="input-groupp input-groupp-icon">
                          <input type="date" placeholder="تاريخ بداية التسجيل" style="padding-bottom: 0;" />
                          <div class="input-icon"><i class="fa-solid fa-calendar-days"></i></div>
                        </div>
                        <div class="input-groupp input-groupp-icon">
                            <input type="date" placeholder="تاريخ نهاية التسجيل" style="padding-bottom: 0;" />
                            <div class="input-icon"><i class="fa-solid fa-calendar-days"></i></div>
                          </div>
                          <div class="input-groupp input-groupp-icon">
                            <input type="date" placeholder="تاريخ بداية الجلسات" style="padding-bottom: 0;"/>
                            <div class="input-icon"><i class="fa-solid fa-calendar-days"></i></div>
                          </div>
                          <div class="input-groupp input-groupp-icon">
                            <input type="date" placeholder="تاريخ نهاية الجلسات" style="padding-bottom: 0;" />
                            <div class="input-icon"><i class="fa-solid fa-calendar-days"></i></div>
                          </div>
                          <div class="input-groupp input-groupp-icon">
                            <input type="number" placeholder="علامة المحصلة النهائية" />
                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                          </div>
                          <div class="input-groupp input-groupp-icon">
                            <input type="text" placeholder="علامة الامتحان النهائي " />
                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                          </div>
                          <div class="input-groupp input-groupp-icon">
                          <input type="text" placeholder="علامة الشفهي  " />
                          <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                        </div>
                        <div class="input-groupp input-groupp-icon">
                            <input type="text" placeholder="رسوم التسجيل" />
                            <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                          </div>
                        <div class="input-groupp input-groupp-icon">
                            <select>
                                <option>اختر نوع التدريب </option>
                                <option>ai</option>
                              </select>


                        </div>
                      </div>

                      <div class="roww">
                        <h4>حالة الدورة</h4>
                        <div class="input-groupp">
                          <input id="qcard" type="radio" name="payment-method" value="0" checked="true"/>
                          <label for="qcard"><span><i class="fa-solid fa-check"></i>مفتوحة للتسجيل</span></label>
                          <input id="qpaypal" type="radio" name="payment-method" value="1"/>
                          <label for="qpaypal"> <span><i class="fa-solid fa-xmark"></i>مغلقة </span></label>
                        </div>
                      </div>
                      <div class="roww">
                       <input type="submit" value="حفظ" class="bttn">
                      </div>
                    </form>
                  <!-- </div> -->

            </div>
        </div>
        <div class="popup" id="popuppo-1">
            <div class="overlay"></div>
            <div class="content">
                <div class="close-btn" onclick="togglePopuoo()">&times;</div>
                <!-- <div class="containerr"> -->
                    <form>
                      <div class="roww">
                        <h4> تعديل التسجيل</h4>

                        <div class="input-groupp">
                            <select>
                              <option>اختر السنة التدريبية</option>
                              <option>2020</option>
                              <option>2021</option>
                            </select>

                          </div>
                          <div class="input-groupp input-groupp-icon">
                              <select>
                                  <option>اختر البرنامج التدريبي</option>
                                  <option>ai</option>
                                </select>


                          </div>
                          <div class="input-groupp input-groupp-icon">
                              <select>
                                  <option>اختر الدورة التدريبية</option>
                                  <option>ai</option>
                                </select>


                          </div>

                      <div class="input-groupp input-groupp-icon">
                          <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                        <input type="number" placeholder="رقم(ترتيب) الدورة التدريبية" value="الدورة الاولى"/>

                      </div>
                      <div class="input-groupp input-groupp-icon">
                        <input type="number" placeholder="نسبة الحسم على الدورة" value="5000"/>
                        <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                      </div>
                      <div class="input-groupp input-groupp-icon">
                          <input type="text" placeholder="الوصف" value="الدورة جميلة"/>
                          <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                        </div>

                      <div class="input-groupp input-groupp-icon">
                        <input type="date" placeholder="تاريخ بداية التسجيل" style="padding-bottom: 0;" value="2024-10-03"/>
                        <div class="input-icon"><i class="fa-solid fa-calendar-days"></i></div>
                      </div>
                      <div class="input-groupp input-groupp-icon">
                          <input type="date" placeholder="تاريخ نهاية التسجيل" style="padding-bottom: 0;" value="2024-10-03"/>
                          <div class="input-icon"><i class="fa-solid fa-calendar-days"></i></div>
                        </div>
                        <div class="input-groupp input-groupp-icon">
                          <input type="date" placeholder="تاريخ بداية الجلسات" style="padding-bottom: 0;" value="2024-10-03"/>
                          <div class="input-icon"><i class="fa-solid fa-calendar-days"></i></div>
                        </div>
                        <div class="input-groupp input-groupp-icon">
                          <input type="date" placeholder="تاريخ نهاية الجلسات" style="padding-bottom: 0;" value="2024-10-03"/>
                          <div class="input-icon"><i class="fa-solid fa-calendar-days"></i></div>
                        </div>
                        <div class="input-groupp input-groupp-icon">
                          <input type="number" placeholder="علامة المحصلة النهائية" value="100"/>
                          <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                        </div>
                        <div class="input-groupp input-groupp-icon">
                          <input type="text" placeholder="علامة الامتحان النهائي " value="50"/>
                          <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                        </div>
                        <div class="input-groupp input-groupp-icon">
                        <input type="text" placeholder="علامة الشفهي  " value="50"/>
                        <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                      </div>
                      <div class="input-groupp input-groupp-icon">
                        <input type="text" placeholder="رسوم التسجيل"  value="5000000"/>
                        <div class="input-icon"><i class="fa-sharp fa-solid fa-calendar-week"></i></div>
                      </div>
                      <div class="input-groupp input-groupp-icon">
                          <select>
                              <option>اختر نوع التدريب </option>
                              <option>ai</option>
                            </select>


                      </div>
                      </div>

                      <div class="roww">
                        <h4>حالة الدورة</h4>
                        <div class="input-groupp">
                            <input id="sqcard" type="radio" name="payment-method" value="0" checked="true"/>
                            <label for="sqcard"><span><i class="fa-solid fa-check"></i>مفتوحة للتسجيل</span></label>
                            <input id="aqpaypal" type="radio" name="payment-method" value="1"/>
                            <label for="aqpaypal"> <span><i class="fa-solid fa-xmark"></i>مغلقة </span></label>
                        </div>
                        <!-- <div class="input-groupp">
                            <label class="switch">
                                <input type="checkbox">
                                <span class="slider"></span>
                              </label>
                        </div> -->



                      </div>
                      <div class="roww">
                       <input type="submit" value="حفظ" class="bttn">
                      </div>
                    </form>
                  <!-- </div> -->

            </div>
        </div>
        <!-- /. PAGE WRAPPER  -->
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
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    @endsection

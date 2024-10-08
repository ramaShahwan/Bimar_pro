@extends('layout_admin.master')
@section('content')
<div id="page-wrapper">
            <div class="table-container">
                <table class="program-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Program Code</th>
                            <th>Program Name EN</th>
                            <th>Program Name AR</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>AORND</td>
                            <td>System Orientation for Persons with Disabilities</td>
                            <td>النظام التوجيهي للأشخاص ذوي الإعاقة</td>
                            <td><input type="checkbox" class="toggle-switch" /></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>AR026</td>
                            <td>Alia Awwad</td>
                            <td>عليا عواد</td>
                            <td><input type="checkbox" class="toggle-switch" /></td>
                        </tr>
                        <tr >
                            <td>3</td>
                            <td>ISA</td>
                            <td>Sand Engineering and Fabrication</td>
                            <td>هندسة الرمل والتصنيع</td>
                            <td><input type="checkbox" class="toggle-switch" checked /></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>DAC</td>
                            <td>Digital Access Content</td>
                            <td>المحتوى الرقمي للوصول</td>
                            <td><input type="checkbox" class="toggle-switch" /></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Line</td>
                            <td>Long-standing Program</td>
                            <td>برنامج قائم منذ زمن طويل</td>
                            <td><input type="checkbox" class="toggle-switch" /></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
@endsection

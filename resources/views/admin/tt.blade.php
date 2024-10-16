@extends('layout_admin.app')
@section('content')
<div class="container">
        <!-- <div class="row text-center " style="padding-top:100px;">
            <div class="col-md-12">
                <img src="assets/img/logo-invoice.png" />
            </div>
        </div> -->
        <div class="containerd">
            <div class="login-boxx">
                <div class="login-contentt">
                    <h2>Login to your account</h2>
                    <form>
                        <div class="input-groupd">
                            <label for="email">Email</label>
                            <input type="email" id="email" placeholder="Email">
                        </div>
                        <div class="input-groupd">
                            <label for="password">Password</label>
                            <input type="password" id="password" placeholder="Password">
                        </div>
                        <button type="submit" class="btn">Login in</button>
                    </form>
                    <p class="sign-up-text">Don’t have an account? <a href="#">Sign Up!</a></p>
                    <!-- <div class="faq-section">
                        <p><span class="faq-icon">?</span> Can you change your plan?</p>
                        <p class="small-text">Whenever you want. Fluid will also change with you according to your needs.</p>
                        <a href="#" class="contact-link">Contact Us</a>
                    </div> -->
                </div>
            </div>
            <div class="video-box">
                <video autoplay muted loop>
                    <source src="assets/img/04.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    </div>
    @endsection

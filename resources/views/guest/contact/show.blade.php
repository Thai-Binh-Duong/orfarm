@extends('welcome')

@section('content')
<div class="contact-us-page">
    <div class="contact-us-page-top">
        <div class="breadcum">
            <p><a href="#"> Home</a> / <a href="#">Contact Us </a> </p>
        </div>
        <p>Contact us</p>
        <p>Looking For Orfarm?</p>
        <p>The liber tempor cum soluta nobis eleifend option congue doming quod mazim.</p>
        <div class="store-location-contact-us-page">
            <div class="store-position-contact-us-content">
                <img src="{{ asset("/image/contact-us-page/bg1.png") }}" alt="">
                <p>Rue Pelleport - Paris</p>
                <ul>
                    <li>Add: 65 Heaven Stress, Beverly, Melbourne</li>
                    <li>Phone: (+100) 123 456 7890</li>
                    <li>Email: Orfarm@google.com</li>
                </ul>
            </div>
            <div class="store-position-contact-us-content">
                <img src="{{ asset("/image/contact-us-page/bg2.png") }}" alt="">
                <p>Rue Pelleport - Paris</p>
                <ul>
                    <li>Add: 65 Heaven Stress, Beverly, Melbourne</li>
                    <li>Phone: (+100) 123 456 7890</li>
                    <li>Email: Orfarm@google.com</li>
                </ul>
            </div>
            <div class="store-position-contact-us-content">
                <img src="{{ asset("/image/contact-us-page/bg3.png") }}" alt="">
                <p>Rue Pelleport - Paris</p>
                <ul>
                    <li>Add: 65 Heaven Stress, Beverly, Melbourne</li>
                    <li>Phone: (+100) 123 456 7890</li>
                    <li>Email: Orfarm@google.com</li>
                </ul>
            </div>
            <div class="store-position-contact-us-content">
                <img src="{{ asset("/image/contact-us-page/bg4.png") }}" alt="">
                <p>Rue Pelleport - Paris</p>
                <ul>
                    <li>Add: 65 Heaven Stress, Beverly, Melbourne</li>
                    <li>Phone: (+100) 123 456 7890</li>
                    <li>Email: Orfarm@google.com</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="contact-us-page-content">
        <div class="map-contact-contact-us-page">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3722.0099901344515!2d105.8692554146501!3d21.112167885953216!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313500b2ffacb0a3%3A0x952a436b3aab36de!2zRGkgdMOtY2ggVGjDoG5oIEPhu5UgTG9h!5e0!3m2!1svi!2s!4v1666758284231!5m2!1svi!2s"
            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="form-contact-contact-us-page">
            <p>LEAVE A REPLY</p>
            <p>Your email address will not be published. Required fields are marked *</p>
            <form action="" method="post">
                <div class="two-column">
                    <input type="text" placeholder="Your Name ">
                    <input type="email" placeholder="Your Email ">
                </div>
                <div class="two-column">
                    <input type="text" placeholder="Your Phone ">
                    <input type="text" placeholder="Your Subject ">
                </div>
                
                <textarea name="" placeholder="Message" id=""></textarea>
                <input type="checkbox" id="checkbox-contact-us-page"><label class="checkbox-important" for="checkbox-contact-us-page">I am bound by the terms of the Service I accept Privacy Policy.</label>
                <input type="submit" value="SEND MESSAGE">
            </form>
        </div>
    </div>
</div>
@endsection
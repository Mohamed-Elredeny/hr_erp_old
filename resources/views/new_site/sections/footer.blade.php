<footer class="site-footer" id='bottom'>
    <div class="form-sec">
        <div class="contact-box">
            <div class="container">
                <div class="title-sec text-center">
                    <h4 class="title">
                        احصل على استشارة مجانية
                    </h4>
                </div>
                <div class="row form-row  ">
                    <div class="cols col-sm-6 wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".2s">
                        <div class="add-title">
                            <div class="title">العنوان:</div>
                            <a class="add" target="_blank"
                               href="https://www.google.com/maps/dir//24.22241777767858,55.68790702628135/@ 24.22241777767858,55.68790702628135,12z">{{$settings->where('key','address')->first()->value ?? 'Let your admin add value'}}</a>
                        </div>
                        <div class="add-title">
                            <div class="title">رقم الهاتف:</div>
                            <a href="tel:{{$settings->where('key','phone')->first()->value ?? 'Let your admin add value'}}" dir="ltr" class="add" dir="ltr">{{$settings->where('key','phone')->first()->value ?? 'Let your admin add value'}}</a>
                        </div>
                        <div class="add-title mb-0">
                            <div class="title">البريد الإلكتروني:</div>
                            <a href="mailto:info@my-technology.com" class="add">{{$settings->where('key','email')->first()->value ?? 'Let your admin add value'}}</a>
                        </div>
                    </div>
                    <div class="cols col-sm-6  wow fadeInRight" data-wow-duration="1.6s" data-wow-delay=".5s">
                        <form method="post" action="{{route('SendMessage',['type'=>'consultation'])}}" id="contact-form2" novalidate>
                            @csrf
                            <div id="contact12"></div>
                            <input type="hidden" id="id2" name="id" value="0">
                            <input type="hidden" id="subject2" name="subject" value="Feedback">
                            <div class="input-style">
                                <input type="text" id="last_name2" name="name" class="ctm-input"
                                       placeholder="اسم العميل"
                                       required="">
                            </div>
                            <div class="input-style">
                                <input type="email" id="email2" name="email" class="ctm-input"
                                       placeholder="البريد الإلكتروني" required="">
                            </div>
                            <div class="input-style">
                                <input type="tel" id="phone2" name="phone" class="ctm-input" placeholder="هاتف"
                                       required="">
                            </div>
                            <div class="input-style">
                                <input type="text" id="last_name2" name="title" class="ctm-input"
                                       placeholder="عنوان الرسالة"
                                       required="">
                            </div>
                            <div class="input-style">
                                <input type="text" id="message_text2" name="details" class="ctm-input"
                                       placeholder="تفاصيل الرسالة" required="">
                            </div>
                            <p id="error-message2" class="alert alert-success"></p>
                            <div class="contact_form_button" id="mail_send_div2">
                            </div>
                            <div class="btn-col d-flex justify-content-end">
                                <button type="submit"  class="submit-btn border-0" name="btnSubmit"
                                        value="Send">ارسل <i class="loading-icon fas fa-spinner fa-spin hide"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="logo-sec">
        <div class="container">
            <div class="logo-row d-flex justify-content-between flex-wrap flex-xl-nowrap align-items-start">
                <div class="logo-block wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".2s">
                    <a href="#" class="logo">
                        <img src="https://www.my-technology.com/assets/front/img/logo.png" alt="footer-logo"
                             class="img-fluid footer-logo">
                    </a>
                </div>
                <div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay=".2s">
                    <div class="desc-block  wow fadeInRight" data-wow-duration="2s" data-wow-delay=".2s"
                         style="visibility: visible; animation-duration: 2s; animation-delay: 0.2s; animation-name: fadeInRight;">
                        يتم إنشاء وتصميم جميع حلول ماي تكنولوجي لأعمال و احتياجات عملائنا ، من أجل تقديم تجربة فريدة
                        مصممة وفقًا للطريقة التي تعمل بها كل شركة على أفضل وجه باستخدام أفضل التقنيات الأكثر تقدمًا
                        لتوفير الفائدة والأمان
                    </div>

                    <ul class="social-app-link footer-social-new d-flex align-items-center justify-content-center mt-4 pt-2">
                        <li><a href="{{$settings->where('key','linkedin')->first()->value ?? 'Let your admin add value'}}" target="_blank"><i
                                    class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="{{$settings->where('key','facebook')->first()->value ?? 'Let your admin add value'}}" target="_blank"><i
                                    class="fab fa-facebook-f"></i></a></li>
                        <li><a href="{{$settings->where('key','instagram')->first()->value ?? 'Let your admin add value'}}" target="_blank"><i
                                    class="fab fa-instagram"></i></a></li>
                        <li><a href="{{$settings->where('key','twitter')->first()->value ?? 'Let your admin add value'}}" target="_blank"><i
                                    class="fab fa-twitter"></i></a></li>
                        <li><a href="{{$settings->where('key','youtube')->first()->value ?? 'Let your admin add value'}}" target="_blank"><i
                                    class="fab fa-youtube"></i></a></li>
                        <li><a href="{{$settings->where('key','snapchat')->first()->value ?? 'Let your admin add value'}}" target="_blank"><i
                                    class="fab fa-snapchat-ghost"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="form-sec">
        <div class="contact-box">
            <div class="container">
                <div class="title-sec text-center">
                    <h4 class="title">
                        عندك فكره مشروع؟
                    </h4>
                </div>
                <div class="row form-row  ">
                    <div class="cols col-sm-6 wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".2s">
                        <div class="add-title">
                            <div class="title">العنوان:</div>
                            <a class="add" target="_blank"
                               href="https://www.google.com/maps/dir//24.22241777767858,55.68790702628135/@ 24.22241777767858,55.68790702628135,12z">{{$settings->where('key','address')->first()->value ?? 'Let your admin add value'}}</a>
                        </div>
                        <div class="add-title">
                            <div class="title">رقم الهاتف:</div>
                            <a href="tel:{{$settings->where('key','phone')->first()->value ?? 'Let your admin add value'}}" dir="ltr" class="add" dir="ltr">{{$settings->where('key','phone')->first()->value ?? 'Let your admin add value'}}</a>
                        </div>
                        <div class="add-title mb-0">
                            <div class="title">البريد الإلكتروني:</div>
                            <a href="mailto:info@my-technology.com" class="add">{{$settings->where('key','email')->first()->value ?? 'Let your admin add value'}}</a>
                        </div>
                    </div>
                    <div class="cols col-sm-6  wow fadeInRight" data-wow-duration="1.6s" data-wow-delay=".5s">
                        <form method="post" action="{{route('SendMessage',['type'=>'projectIdea'])}}" id="contact-form2" novalidate enctype="multipart/form-data">
                            @csrf
                            <div id="contact12"></div>
                            <input type="hidden" id="id2" name="id" value="0">
                            <input type="hidden" id="subject2" name="subject" value="Feedback">
                            <div class="input-style">
                                <input type="text" id="last_name2" name="name" class="ctm-input"
                                       placeholder="اسم العميل"
                                       required="">
                            </div>
                            <div class="input-style">
                                <input type="email" id="email2" name="email" class="ctm-input"
                                       placeholder="البريد الإلكتروني" required="">
                            </div>
                            <div class="input-style">
                                <input type="tel" id="phone2" name="phone" class="ctm-input" placeholder="هاتف"
                                       required="">
                            </div>
                            <div class="input-style">
                                <input type="text" id="last_name2" name="title" class="ctm-input"
                                       placeholder="عنوان الرسالة"
                                       required="">
                            </div>
                            <div class="input-style">
                                <input type="text" id="message_text2" name="details" class="ctm-input"
                                       placeholder="تفاصيل الرسالة" required="">
                            </div>
                            <div class="input-style">
                                <label class="ctm-input" for="">المرفقات</label>
                                <input class="ctm-input" type="file" id="last_name2" name="images[]" multiple>
                            </div>
                            <div class="btn-col d-flex justify-content-end">
                                <button type="submit"  class="submit-btn border-0" name="btnSubmit"
                                        value="Send">ارسل
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="copyright-sec" style="background:white !important;">
        <div class="container">
            <div class="copy-row d-flex justify-content-between align-items-center flex-wrap">
                <div class="desc" style="color:#005FE1FF !important">
                    Copyright &copy; 2023 - All Rights Reserved By <a href="">Najd ElQmm</a>
                </div>
                <div class="footer-menu">
                    <ul class="d-flex flex-wrap">
                        <li class="items">
                            <a href="{{route('privacy-policy')}}" class="link">
                                سياسة خاصة
                            </a>
                        </li>
                        <li class="items">
                            <a href="{{route('terms-and-conditions')}}" class="link">
                                البنود و الأحكام
                            </a>
                        </li>
                        <li class="items">
                            <a href="{{route('about-us')}}" class="link">
                                معلومات عنا
                            </a>
                        </li>
                        <li class="items">
                            <a href="{{route('contact-us')}}" class="link">
                                اتصل بنا
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

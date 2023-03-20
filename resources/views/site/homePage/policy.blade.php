@extends('layouts.layoutSite.SitePage')
@section('content')
<link href="{{asset('/assets/new_assets/css/who-us.css?'. time() )}}" rel="stylesheet" />

 
<!-- breadcrumb area start -->
{{-- <br>
<div class="breadcrumb-area" >
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                <div style=" position:absolute; left: 80%;">
                                <img src="{{asset('/assets/img/nav.png')}}"  width="100"></div>
                                    <li class="breadcrumb-item"><a href="{{route('viewHomePage')}}"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{__('Privacy policy')}}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
<br> --}}
<!-- start boards -->
<section dir="{{LaravelLocalization::getCurrentLocaleDirection()}}" >
<div class="container pr-60 pl-60">
    <div class="row">
        
    {{-- @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
    {!!$data!!}
    @else
     {!!$data_en!!}
    @endif --}}
    <div class="about">
        <div class="container">
            <h1 class="text-end mb-4">{{__('Privacy Policy | www.limogesd.com')}}</h1>
            <p>
                {{__('This privacy policy sets out how .ae uses and protects any information that you give www.limogesd.com when you use this website. By using the site, you are accepting the practices described in this privacy policy. These executions may be reshaped, but any alter will be posted and changes will only apply to activities and information on advancement, not retroactive basis. We aggregate the personal information that you provide us, such as when you: Sign up for or register on www.limogesd.com, Register to use www.limogesd.com or sign up for newsletter of specials or other promotions on www.limogesd.com Place an order or purchase products or services at our online store or over the phone, Contact us for any reason, such as by replying to inquiries by mail, or through our website’s live chat, by telephone through customer service, or We may automatically collect some information when you visit our website, such as your internet protocol address and operating system, your site browsing and the time and date of your visit and purchases. This information may be collected through the use of “cookies”. takes appropriate steps to ensure data privacy and security including through various hardware and software methodologies. However, (www.limogesd.com) cannot guarantee the security of any information that is disclosed online. The Website Policies and Terms & Conditions may be changed or updated occasionally to meet the requirements and standards. Therefore, the Customers’ are encouraged to frequently visit these sections to be updated about the changes on the website. Modifications will be effective on the day they are posted.')}}
            </p>
            <p>
                {{__('How we use Cookies')}}
            </p>
            <p>
                {{__('We use ‘traffic log’ cookies to identify which pages are being used. Cookies collect information about how you use our website e.g. which pages you visit, and if you experience any errors. These cookies do not collect any information that could identify you all the information collected is anonymous and is only used to help us improve how our website works, understand what interests our users and improve our website in order to tailor it to customer needs. You can choose to accept or decline cookies. Most web browsers automatically accept cookies, but you can usually modify your browser setting to decline cookies if you prefer. This may prevent you from taking full advantage of the website.')}}
            </p>
            <p>
                {{__('Your personal data will be retain secure. Only authorized employees, and contractors (who have agreed to keep information safe and confidential) have access to this data. All of credit/debit cards details and personally identifiable Data Won’t Be Saved, sold, shared, Leased or Rented to any third parties. Pandoracake.ae can also disclose personally identifiable information so as to answer a subpoena, court order or other similar request. .ae may also give such personally identifiable information in response to some law enforcement agencies ask or as otherwise required by law. Your personally identifiable information may be offered to a party whenwww.limogesd.com files for bankruptcy, or there’s a transfer of their possession or assets of www.limogesd.com in connection with proposed or consummated corporate reorganizations, like mergers or acquisitions. www.limogesd.com does not allow to share minor information. www.limogesd.com does not knowingly distribute personal information regarding minors.')}}
            </p>
            <p>
                {{__('Variant Network')}}
            </p>
            <p>
                {{__('www.limogesd.com isn’t liable for the privacy policies of sites to which it connects. If you supply any information to these third parties’ different rules concerning the collection and use of your personal information could employ. We strongly advise you to review these third party’s privacy policies before providing any information to them.')}}
            </p>
            <p>
                {{__('Improvement')}}
            </p>
            <p>
                {{__('If you would like to alter or improvement any information Pandoracake.ae has obtained, please contact ')}}
            </p>
            <p>
                {{__('Advertisements')}}
            </p>
            <p>
                {{__('We use third-party advertising organizations to promote ads when you visit our Website. These companies may use data (not contain your name, address, or contact number) about your visits to this and other websites in order to provide advertisements about goods and services of interest to you.')}}
            </p>
        </div>
    </div>
 
</div>
</div>
</section> 

@stop

@section('script')

<script src="{{asset('SitePage/js/plugins.js ')}}"></script>
<script src="{{asset('SitePage/js/main.js')}}"></script>

@stop


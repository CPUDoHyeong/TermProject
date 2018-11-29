@extends('layouts.master')

@section('header')
    @include('layouts.header')
@endsection

@section('nav')
    @include('help.help_nav')
@endsection

@section('content')

        <div class="content">
                <div class="contentbox contact">
                    <h2>언제든 환영입니다!</h2>
                    <p>
                    e-survey는 여러분들의 의견에 목말라 있습니다! e-survey를 쓰시면서 또는 쓰시기 전 의문나는 점들이나 제안하고 싶은것들이 있으시면 언제든 저희에게 말씀해 주세요. 여러분들의 의견을 바탕으로 더 나은 서비스를 만들겠습니다.
                    </p>
                    <div class="contacts">
                        <dl>
                            <dt>e-survey 고객 지원</dt>
                            <dd>
                                <a class="embed" data-type="popup" id="icon-a"> 
                                궁금하거나 제안할것이 있나요? e-survey로 부터 답변을 원하시면 고객 지원을 이용해 주세요.
                                <br>
                                <img id="icon-img" src="{{ asset('img/help/customer-stroke.png') }}" width="50px" height="50px"/> 
                                </a>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <div id="support" class="popup" style="display:none;">
        <span class="support-bg"></span>
        <iframe width="100%" frameborder="0" scrolling="no" src="{{ url('customer_support') }}">
        </iframe>
        <a class="close" id="close-iframe"></a>
    </div>
    <script src="{{ asset('js/help/contact.js') }}" type="text/javascript"></script>
</body>
</html>

@endsection
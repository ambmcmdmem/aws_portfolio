<!--layouts/app.blade.phpを使っているということ-->
@extends('layouts.app')

@section('content')

<?php 


//友達リストの定義
$people_info_list_arr = [
    'my' => [ //自分自身
        //上部のタイトル
        'icon' => '<i class="fas fa-user"></i>',
        'title' => 'マイプロフィール',
        'content' => [
            [
                'id'   => 'tsunagaru_satoshi', //ID
                'img'  => asset('img/people/my_face.png'), //画像のURL
                'name' => 'つながる　さとし' //名前
            ]
        ] 
    ],
    'apply' => [ //申請が来ている
        'icon' => '<i class="fas fa-user-plus"></i>',
        'title' => '申請が来ています',
        'content' => [
            [
                'id'   => 'tsunagaru_satoshi',
                'img' => '',
                'name' => 'おはなし　太郎'
            ],
            [
                'id'   => 'tsunagaru_satoshi',
                'img' => '',
                'name' => 'てすと　てすと'
            ]
        ]
    ],
    'friends' => [ //友達
        'icon' => '<i class="fas fa-user-friends"></i>',
        'title' => '友だち',
        'content' => [
            [
                'id'   => 'tsunagaru_satoshi',
                'img' => '',
                'name' => 'おはなし　太郎'
            ],
            [
                'id'   => 'tsunagaru_satoshi',
                'img' => '',
                'name' => 'てすと　てすと'
            ]
        ]
    ]
];

?>

<div class="top">
    <!--<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>-->
    <div class="position-relative">
        <? //上に乗っているベール ?>
        <div class="thin-veil text-center p-5" style="display: none;">
            <h2 class="">
                つながる。
            </h2>
            <p>
                {{ config('app.name', 'Laravel') }}は、<br>
                誰とでもつながることができるアプリです。
            </p>
        </div>
        <? //友達リスト ?>
        <ul class="people-info-list-wrap container">
            @foreach($people_info_list_arr as $people_info_list)
            <li class="people-info-list-item">
                <div class="people-info-title-wrap d-flex align-items-center">
                    {{ $people_info_list['icon'] }}
                    <em class="people-info-list-title">{{ $people_info_list['title'] }}</em>
                </div>
                @foreach($people_info_list['content'] as $people_info_arr)
                <ul class="people-info-list pl-0">
                    <li class="people-info-item d-flex align-items-center ">
                        <figure class="people-media-wrap">
                            <img src="{{ $people_info_arr['img'] }}" alt="{{ $people_info_arr['name'] }}">
                        </figure>
                        <div class="people-info-wrap">
                            <div class="people-name">{{ $people_info_arr['name'] }}</div>
                            <small class="people-id">@:{{ $people_info_arr['id'] }}</small>
                        </div>
                    </li>
                </ul>
                @endforeach
            </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
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
                'img'  => asset('img/common/my_face.png'), //画像のURL
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
                'img' => asset('img/common/moon.jpg'),
                'name' => 'おはなし　太郎'
            ],
            [
                'id'   => 'tsunagaru_satoshi',
                'img' => asset('img/common/porsche.jpg'),
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
                'img' => asset('img/common/rabbit.jpg'),
                'name' => 'おはなし　太郎',
                'note' => 2 //通知
            ],
            [
                'id'   => 'tsunagaru_satoshi',
                'img' => asset('img/common/sadness.jpg'),
                'name' => 'てすと　てすと',
                'selected' => 'active',
            ]
        ]
    ]
];

$active_user_arr;

?>

<div class="top">
    <div class="position-relative">
        <? //上に乗っているベール ?>
        <div class="thin-veil text-center flex-center p-5" style="display: none;">
            <h2 class="font-weight-bold">
                つながる。
            </h2>
            <p>
                {{ config('app.name', 'Laravel') }}は、<br>
                誰とでもつながることができるアプリです。
            </p>
        </div>
        <? //友達リスト ?>
        <div class="container">
            <div class="card flex-row">
                <ul class="people-info-list-wrap py-4 col-3">
                    @foreach($people_info_list_arr as $people_info_list_key => $people_info_list)
                    <li class="people-info-list-item">
                        <div class="people-info-title-wrap d-flex align-items-center">
                            <?php echo $people_info_list['icon'] ?>
                            <em class="people-info-list-title">{{ $people_info_list['title'] }}</em>
                            @if($people_info_list_key != 'my')
                            <div class="min-circle-icon">{{ count($people_info_list['content']) }}</div>
                            @endif
                        </div>
                        <ul class="people-info-list pl-0">
                        @foreach($people_info_list['content'] as $people_info_arr)
                            <li class="people-info-item d-flex align-items-center 
                            @if(!empty($people_info_arr['selected'])){{ $people_info_arr['selected'] }}
                            <?php $active_user_arr = $people_info_arr ?>@endif">
                                <figure class="people-media-wrap">
                                    <img src="{{ $people_info_arr['img'] }}" alt="{{ $people_info_arr['name'] }}">
                                    @if(!empty($people_info_arr['note']))
                                    <div class="min-circle-icon red-circle">{{ $people_info_arr['note'] }}</div>
                                    @endif
                                </figure>
                                <div class="people-info-wrap">
                                    <div class="people-name">{{ $people_info_arr['name'] }}</div>
                                    <small class="people-id">@:{{ $people_info_arr['id'] }}</small>
                                </div>
                            </li>
                        @endforeach
                        </ul>
                    </li>
                    @endforeach
                </ul>
                <div class="chat-room-wrap col-9 px-0">
                    <div>
                        <em>{{ $active_user_arr['name'] }}</em>
                    </div>
                    <div>
                        <ul class="chat-list">
                            <li class="chat-item">
                                <time>1日前</time>
                                <div class="chat-content">
                                    こんにちは！
                                </div>
                            </li>
                            <li class="chat-item my">
                                <time>23分前</time>
                                <div class="chat-content">
                                    こんにちは！
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <input type="file">
                        <input type="text" name="chat" required placeholder="内容を入力">
                        <button>送信ボタン（仮）</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
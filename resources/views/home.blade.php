@extends('master')
@section('title', 'Home')


@section('content')
    <div class="container">
        <div class="row banner">
        	<div class="col-md-12">
        		<h1 class="text-center margin-top-100 edit-content">
        			Learning Laravel 5
        		</h1>

        		<h3 class="text-center margin-top-100 edit-content">
        			Building Practical Applications
        		</h3>

        		<div class="text-center">
        			<a href="ttps://learninglaravel.net/">
        				<img src="https://learninglaravel.net/img/LearningLaravel5_cover0.png" width="302" height="391" alt="">
        			</a>
        		</div>

        	</div>
        </div>
    </div>

    <div id="app">
         <p>@{{message}}</p>
        <ol>
          <li v-for="item in groceryList">
            @{{item.text}}
          </li>
        </ol>

        <button v-on:click="reverse">Reverse</button>
    </div>
@endsection
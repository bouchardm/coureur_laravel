@extends('layout.master')

@section('content')
	<div class="medium-12 columns">
		<a class="fa fa-question-circle fa-3x pull-right" href="guide#message" alt="Aide en ligne"></a>
		<h3>Messages</h3>

		<div class="panel">
			@include('layout.message')
			
			
			@if (isset($messages) && !$messages->isEmpty())
				<dl class="accordion" data-accordion>
		            @foreach ($messages as $message)
		            	<dd>
		            		<a href="#panel{{ $message->idMessage }}"><b>{{ $message->titre }}</b>
			            		<span style="float:right">
			            			{{ $message->courriel }}
			            		</span>
		            		</a>
		            		<div id="panel{{ $message->idMessage }}" class="content">
			            		@if (Auth::User()->type == "Gestionnaire")
			            			<a href="{{route('message.delete', $message->idMessage) }}" class="button tiny radius left"> Supprimer </a>
			            		@endif
			            		<span style="float:right">
			            			{{ $message->date }}
			            		</span>
			            		<hr />

			            		{{ $message->message }}
			            	</div>
			            </dd>
		            @endforeach
					
		        </dl>
		        {{ $messages->links() }}
			@else
				<p class="text-center">Il n'y a pas de message!</p>
			@endif

		</div>		
	</div>
@stop
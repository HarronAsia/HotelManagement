@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">

        <header>
            <h1> <i class="fa fa-envelope"></i>&ensp;{{__('All Unread Messages')}}</h1>
            </header>
            &ensp;
            <div class="pull-right">
                <a href="{{ route('notification.read.all',app()->getLocale())}}">
                    <button class="btn btn-danger">
                        {{__('Read All')}}
                    </button>
                </a>
            </div>
        
        <table class="table table-bordered table-striped ">
            <thead>
                <tr>
                    <th scope="col">{{__('Data')}}</th>
                    <th scope="col">{{__('Created At')}}</th>
                    <th scope="col">{{__('Action')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($notifications as $singlenotification)
                <tr>
                    <th scope="row">{{json_decode(json_encode($singlenotification->data))->data}}</td>
                    <td>{{$singlenotification->created_at}}</td>
                    <td>
                        <a href="{{ route('notification.read', ['locale'=>app()->getLocale(),'id'=> $singlenotification->id])}}">
                            <button class="btn btn-danger">
                                &times;
                            </button>
                        </a>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
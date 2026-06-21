@extends('layouts.admin')

@section('title', 'AC - Atualização do Registro')

@section('content')
    <x-admin.subject-form :action="route('admin.subjects.update', $subject->id)" method="PUT" :subject="$subject" :services="$services" :selectedServices="$selectedServices" />
@endsection

@extends('layouts.admin')

@section('title', 'AC - Novo Atendimento')

@section('content')
    <x-admin.subject-form :action="route('admin.subjects.store')" :services="$services" />
@endsection

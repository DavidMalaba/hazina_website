@extends('errors.layout')
@php $title = 'Non autorisé'; @endphp
@section('code', '401')
@section('message', 'Accès non autorisé')
@section('description', 'Vous devez être connecté pour accéder à cette page.')

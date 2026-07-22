@extends('errors.layout')
@php $title = 'Service indisponible'; @endphp
@section('code', '503')
@section('message', 'Service temporairement indisponible')
@section('description', 'Le site est actuellement en maintenance pour des améliorations. Nous serons de retour très bientôt.')

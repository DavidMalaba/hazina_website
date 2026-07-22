@extends('errors.layout')
@php $title = 'Trop de requêtes'; @endphp
@section('code', '429')
@section('message', 'Trop de requêtes')
@section('description', 'Vous avez envoyé trop de requêtes récemment. Veuillez patienter un instant avant de réessayer.')

@component('mail::message')
# Série Criada

A série foi criada.

Acesse aqui:
@component('mail::button', ['url' => route('series.index')])
Ver série
@endcomponent

@endcomponent

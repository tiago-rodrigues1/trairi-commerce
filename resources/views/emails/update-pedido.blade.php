<x-mail::message>
# Atualização de pedido

O status do pedido mostrado a seguir foi atualizado para {{ $pedido->estado }}. [Acessar]({{ $url }}).

## Informações do pedido -  {{ $pedido->numero }}
<x-mail::table>
| Produtos      | Quantidade    |
|:-------------:|:-------------:|
@foreach ($pedido->produtos as $produto)
| {{ $produto->nome }} | {{ $produto->pivot->quantidade }} |
@endforeach
</x-mail::table>
@if ( $pedido->estado == "Cancelado")
Pedido realizado por {{ $pedido->cliente->usuario->nome }}.
@else
Anunciado por {{ $pedido->anunciante->nome_fantasia }}.
@endif

Att.,<br>
{{ config('app.name') }}
</x-mail::message>
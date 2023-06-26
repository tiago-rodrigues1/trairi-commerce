<x-mail::message>
# Atualização de pedido

Notificamos que o status do pedido mostrado a seguir foi atualizado para {{ $pedido->estado }}. [Acessar]({{ $url }}).

## Informações do pedido
<x-mail::table>
| Produtos      | Quantidade    |
|:-------------:|:-------------:|
@foreach ($pedido->produtos as $produto)
| {{ $produto->nome }} | {{ $produto->pivot->quantidade }} |
@endforeach
</x-mail::table>
Anunciado por {{ $pedido->anunciante->nome_fantasia }}.

Att.,<br>
{{ config('app.name') }}
</x-mail::message>
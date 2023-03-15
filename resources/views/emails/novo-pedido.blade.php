<x-mail::message>
# Novo pedido

Novo pedido para {{ $pedido->anunciante->nome_fantasia }}. [Acessar]({{ $url }}).

## Informações
<x-mail::table>
| Produtos      | Quantidade    |
|:-------------:|:-------------:|
@foreach ($pedido->produtos as $produto)
| {{ $produto->nome }} | {{ $produto->pivot->quantidade }} |
@endforeach
</x-mail::table>

### Dados do cliente
* Nome: {{ $pedido->cliente->usuario->nome }}
* Email: {{ $pedido->cliente->usuario->email }}
* Telefone: {{ $pedido->cliente->usuario->telefone }}

### Endereço
* Cidade: {{ $pedido->cidade_destino }}
* Bairro: {{ $pedido->bairro_destino }}
* Endereço: {{ $pedido->endereco_destino }}

Att.,<br>
{{ config('app.name') }}
</x-mail::message>

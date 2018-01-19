@component('mail::message')
# Order received from merugreens.com

An order was received from {{$order->user->first_name}} {{$order->user->last_name}},
email, {{$order->user->email}} and phone number {{$order->user->phone}}, with the following items:

@component('mail::table')
| product name       | quantity         |
| ------------- |:-------------:|
@foreach($order->items as $order)
| {{$order->product->name}}     | {{$order->quantity}}      |
@endforeach
@endcomponent
@component('mail::button', ['url' => $url])
Contact customer
@endcomponent
@component('mail::button', ['url' => route('orders')])
View Order
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

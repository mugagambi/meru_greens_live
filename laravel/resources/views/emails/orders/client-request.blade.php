@component('mail::message')
# Order Received

We have received your order with the following items:

@component('mail::table')
| product name       | quantity         |
| ------------- |:-------------:|
@foreach($order->items as $order)
| {{$order->product->name}}     | {{$order->quantity}}      |
@endforeach
@endcomponent

@component('mail::button', ['url' => ''])
View Order
@endcomponent

We will get back to you soon.Thanks,<br>
{{ config('app.name') }}
@endcomponent

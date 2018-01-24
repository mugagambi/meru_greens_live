@component('mail::message')
# Order received from https://www.merugreens.com

An order was received from {{$order->names}} through the website, https://www.merugreens.com
## Order Details
### Customer Details
@component('mail::table')
| customer names | customer phone number | customer email| county | Nearest Town|
| ------------- |:-------------:|:-------------:|:-------------:|:-------------:|
| {{$order->names }}| {{$order->phone_number}} | {{$order->email}} | {{$order->county}} | {{$order->nearest_town}} |
@endcomponent

### Ordered Items
@component('mail::table')
| product name       | quantity         |
| ------------- |:-------------:|
@foreach($items->items as $product)
| {{$product['item']['name']}}     | {{ $product['qty'] }} Kg(s)      |
@endforeach
@endcomponent
@component('mail::button', ['url' => route('order',['id' => $order->id])])
View Order
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

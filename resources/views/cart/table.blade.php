{{-- Loop through cart items --}}
@foreach($cart as $id => $item)
<tr class="cart-item" 
    data-id="{{ $id }}" 
    data-price="{{ $item['price'] }}" 
    data-quantity="{{ $item['quantity'] }}">

    {{-- Name --}}
    <td>
        <strong>{{ $item['name'] }}</strong>
    </td>
    {{--/ Name --}}
    
    {{-- Price --}}
    <td>${{ number_format($item['price'], 2) }}</td>
    {{--/ Price --}}
    
    {{-- Quantity --}}
    <td>{{ $item['quantity'] }}</td>
    {{--/ Quantity --}}
    
    {{-- Total --}}
    <td>${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
    {{--/ Total --}}
    
    {{-- Remove button --}}
    <td>
        <button class="remove-from-cart btn btn-danger" data-id="{{ $id }}">
            <i class="bi bi-x-circle-fill"></i>
        </button>
    </td>
    {{--/ Remove button --}}
</tr>
@endforeach
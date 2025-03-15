{{-- Loop through cart items --}}
@foreach($cart as $id => $item)
<tr class="cart-item" data-id="{{ $id }}" data-price="{{ $item['price'] }}" data-quantity="{{ $item['quantity'] }}">
    <td>
        <strong>{{ $item['name'] }}</strong>
    </td>
    <td>${{ number_format($item['price'], 2) }}</td>
    <td>{{ $item['quantity'] }}</td>
    <td>${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
    <td>
        {{-- Remove button --}}
        <button class="remove-from-cart btn btn-danger" data-id="{{ $id }}">
            <i class="bi bi-x-circle-fill"></i>
        </button>
    </td>
</tr>
@endforeach
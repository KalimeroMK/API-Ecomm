@if ($order->exists)
    <form class="form-horizontal" method="POST" action="{{ route('orders.update', $order->id) }}"
          enctype="multipart/form-data">
        @method('put')
        @csrf
        @else
            <form class="form-horizontal" method="POST" action="{{ route('orders.store') }}"
                  enctype="multipart/form-data">
                @csrf
                @endif
                <div class="form-group">
                    <label for="status">Status :</label>
                    <select name="status" id="" class="form-control">
                        <option value="">--Select Status--</option>
                        <option value="new" {{(($order->status=='new')? 'selected' : '')}}>New</option>
                        <option value="process" {{(($order->status=='process')? 'selected' : '')}}>process</option>
                        <option value="delivered" {{(($order->status=='delivered')? 'selected' : '')}}>Delivered
                        </option>
                        <option value="cancel" {{(($order->status=='cancel')? 'selected' : '')}}>Cancel</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
    </form>

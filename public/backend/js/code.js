$(function(){
    $(document).on('click', '#delete', function(e){
      e.preventDefault();
      var link = $(this).attr('href');
      Swal.fire({
          title: 'Are you sure?',
          text: "Delete this data?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = link
            Swal.fire(
              'Deleted!',
              'Your file has been deleted.',
              'success'
            )
          }
        })
    });
  });

  $(function(){
    $(document).on('click', '#confirm', function(e){
      e.preventDefault();
      var link = $(this).attr('href');
      Swal.fire({
          title: 'Are you sure?',
          text: "Confirm this order?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Confirm'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = link
            Swal.fire(
              'Confirmed',
              'Order has been confirmed',
              'success'
            )
          }
        })
    });
  });

  $(function(){
    $(document).on('click', '#processing', function(e){
      e.preventDefault();
      var link = $(this).attr('href');
      Swal.fire({
          title: 'Are you sure?',
          text: "Process this order?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = link
            Swal.fire(
              'Processed',
              'Order has been processed',
              'success'
            )
          }
        })
    });
  });

  $(function(){
    $(document).on('click', '#shipped', function(e){
      e.preventDefault();
      var link = $(this).attr('href');
      Swal.fire({
          title: 'Are you sure?',
          text: "Ship this order?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = link
            Swal.fire(
              'Shipped',
              'Order has been shipped',
              'success'
            )
          }
        })
    });
  });

  $(function(){
    $(document).on('click', '#delivered', function(e){
      e.preventDefault();
      var link = $(this).attr('href');
      Swal.fire({
          title: 'Are you sure?',
          text: "Deliver this order?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = link
            Swal.fire(
              'Delivered',
              'Order has been delivered',
              'success'
            )
          }
        })
    });
  });

  $(function(){
    $(document).on('click', '#cancelled', function(e){
      e.preventDefault();
      var link = $(this).attr('href');
      Swal.fire({
          title: 'Are you sure?',
          text: "Cancel this order?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = link
            Swal.fire(
              'Cancelled',
              'Order has been cancelled',
              'success'
            )
          }
        })
    });
  });
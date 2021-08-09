<?php

use Illuminate\Support\Facades\Auth;
use App\Models\invoice;
use App\User;

 function username()
 {
    $name = Auth::user()->name;
    return $name;
 }

 function email()
 {
     $email = Auth::user()->email;
     return $email;
 }

 function total_money()
 {
      $total = number_format( invoice::sum('Total'), 2 );
      return $total;
 }

 function invoices_count()
  {
      $count = invoice::count();
      return $count;
  }

  function invoices_total_unpaid()
  {
      $unpaid = number_format( invoice::where('Value_Status', 2)->sum('Total'), 2 ) ;
      return $unpaid;
  }

  function invoices_unpaid_count()
  {
      $count =  invoice::where('Value_Status', 2)->count();
      return $count;
  }

  function  present_unpaid()
  {
        $count_all          = invoice::count();
        $count_invoices2    = invoice::where('Value_Status', 2)->count();

     if ( $count_invoices2 == 0 ) {
          echo $count_invoices2 = 0;
     } else {
          echo $count_invoices2 = ($count_invoices2 / $count_all) * 100 .'%';
     }
  }

  function invocies_total_paid()
  {
      $total = number_format( invoice::where('Value_Status', 1)->sum('Total'), 2);
      return $total;
  }
  function invoices_paid_count()
  {
      $count =  invoice::where('Value_Status', 1)->count();
      return $count;
  }

  function present_paid()
  {
        $count_all          = invoice::count();
        $count_invoices1    = invoice::where('Value_Status', 1)->count();

        if ($count_invoices1 == 0) {
            echo $count_invoices1 = 0;
        } else {
            echo $count_invoices1 = ($count_invoices1 / $count_all) * 100 . '%';
        }
  }

  function invoices_uncomplete_count()
  {
      $count = invoice::where('Value_Status', 3)->count();
      return $count;
  }

  function invoices_total_uncomplete()
  {
      $total = number_format( invoice::where('Value_Status', 3)->sum('Total'), 2 );
      return $total;
  }

  function present_uncomplete()
  {
        $count_all         = invoice::count();
        $count_invoices1   = invoice::where('Value_Status', 3)->count();

    if ($count_invoices1 == 0) {
        echo $count_invoices1 = 0;
    } else {
        echo $count_invoices1 = ($count_invoices1 / $count_all) * 100 . '%';
    }
  }

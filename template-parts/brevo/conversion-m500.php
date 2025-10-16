<script>
     sendinblue.track(
  'M500_order_completed',
  {
    "FIRSTNAME": "<?php echo $user_data["first_name"];?>",
    "LASTNAME" : "<?php echo $user_data["last_name"];?>",
    "USER_ID": <?php echo $user_id;?>,
  },
  {
    "data": {
      "products": [
        {
          "product_id": <?php echo $_SESSION["cj_events"]["unit_id"];?>,
          "price": <?php echo $_SESSION["cj_events"]["unit_price"]; ?>
        },
      ]
    }
  },
);
</script>
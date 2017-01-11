# Teamleader Coding Test: Discounts

This is my submission for the [coding test](https://github.com/teamleadercrm/coding-test/blob/master/1-discounts.md) as posed by Teamleader.

# Setup

Go to command line and run this in the project folder:

```
composer install
```

Everything was tested on a local WAMP setup using PHP 7.0.10

# Usage

## Calculate discounts

To calculate the discounts on an order, fire up the following request (eg. using Postman App):

  POST /calculate_discounts

The body should contain an order in JSON [see example](https://github.com/teamleadercrm/coding-test/blob/master/example-orders/order1.json). For the example order, this would look like this:

```json
{
  "discounts": [
    {
      "amount": 4.99,
      "description": "buy 5, get one for free (product: B102)"
    }
  ],
  "total_discount": 4.99,
  "count": 1
}
```

You get an array of discounts, each with a discount amount and description. You also get the total discount amount and the number of discounts.

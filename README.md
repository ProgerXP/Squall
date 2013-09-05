# Squall

Functional programming for PHP with a syntax that makes sense. Dependencies-free except for **mbstring**.

Focuses on concise, clean and intuitive syntax. You don't have to learn "promises", "object types", "carriers" or any other high rocket science - just do it:
```PHP
S(array('foo' => 'bar', 123 => 987))->keys()->up()->get();
  //=> array('FOO', '123')
```

The only thing you will want to learn are Callbacks - because if you do it will make your code _much_ more concise:
```PHP
S(array('foo' => 'bar', 123 => 987), 'S.#up#')
  //=> array('FOO', '123')
```

Squall follows jQuery's **implicit iteration** approach meaning that most of its functions accept both scalar and array/object values returning scalars and arrays correspondingly: `echo S::up('scalar');`.

Squall is used by [Sqobot](https://github.com/ProgerXP/Sqobot) and [VaneMart](https://github.com/ProgerXP/VaneMart).

Licensed in public domain. Visit author's homepage at http://proger.me.

## Usage

You only need `squall.php`. After it's `include`'d call `Squall\initEx()` or `Squall\init()` to create aliases for its functions (you don't have to if you will refer to them under its namespace - `Squall\Functions`, etc.).

```PHP
include 'squall.php';
Squall\initEx();
echo S::capitalize('squall it');
```

You can alias Squall to another namespace:
```PHP
Squall\initEx('UnderThisNS');
echo UnderThisNS\S::capitalize('squall it');
```

...and/or with another class name:
```PHP
// for global
Squall\initEx('', 'Sq');
// for NS\
Squall\initEx('NS', 'Sq');

echo NS\Sq::capitalize('squall it');
// Main function is aliased as well.
echo NS\Sq(array('squall it'));
```

**S()** function is twofold:
* with 1 parameter it creates a chained version of data passed to it (usually an array/object); you can call any Squall function (static methods `Squall\Functions`) like `S($data)->keys()` and then retrieve produced data with `->get()`
* with 2 parameters it's an alias to `S::map()`

There is no difference between calling static `S::func()` and intance `S()->func() except that you don't have to provide the data as the first argument`.

## Callbacks

Squall expands on regular PHP _callable_ format adding pipes, extra parameters, evaluations and more while retaining original compatibility (any _callable_ is valid Squall callback but vice versa might not be true).

In general you can not care about custom callbacks if you're happy with what they can provide. Otherwise you might learn how to twist calls and shorten your code with a little extra effort:
```PHP
$data = array(' fBzR  ' => 1, 'XrLf ' => 2);
S::map($data, array('|#trim#|strtolower|str_rot13'));
  //=> array(' fBzR  ' => 'some', 'XrLf ' => 'keys')
```

_Help text is yet to be written, for now you can find a draft [here](http://uverse.i-forge.net/wiki/demo/?33s). Drop a line if you're interested._

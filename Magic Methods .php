<?php
class Person {
    public function __construct($name) {
        $this->name = $name;
    }
}
$person = new Person('Alice');  // Calls __construct()


class Person {
    public function __destruct() {
        echo "Object is being destroyed.";
    }
}
$person = new Person();
unset($person);  // Calls __destruct()


spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});
$obj  = new MyClass1();
$obj2 = new MyClass2(); 


class Magic {
    public function __call($name, $arguments) {
        echo "Method $name does not exist. Arguments: " . implode(', ', $arguments);
    }
}
$obj = new Magic();
$obj->nonExistentMethod('arg1', 'arg2');  // Calls __call()


class Magic {
    public static function __callStatic($name, $arguments) {
        echo "Static method $name does not exist. Arguments: " . implode(', ', $arguments);
    }
}


class Magic {
    private $data = ['foo' => 'bar'];
    public function __get($name) {
        return $this->data[$name] ?? "Property $name does not exist.";
    }
}
$obj = new Magic();
echo $obj->foo;  // Outputs: bar
echo $obj->baz;  // Outputs: Property baz does not exist.


class Magic {
    private $data = [];

    public function __set($name, $value) {
        $this->data[$name] = $value;
    }
}
$obj = new Magic();
$obj->foo = 'bar';  // Calls __set()

class Magic {
    private $data = ['foo' => 'bar'];
    public function __isset($name) {
        return isset($this->data[$name]);
    }
}
$obj = new Magic();
var_dump(isset($obj->foo));  // Outputs: bool(true)
var_dump(isset($obj->baz));  // Outputs: bool(false)


class Magic {
    private $data = ['foo' => 'bar'];
    public function __unset($name) {
        unset($this->data[$name]);
    }
}
$obj = new Magic();
unset($obj->foo);  // Calls __unset()


class Person {
    private $name;
    public function __construct($name) {
        $this->name = $name;
    }
    public function __toString() {
        return "Person's name is " . $this->name;
    }
}
$person = new Person('Alice');
echo $person;  // Outputs: Person's name is Alice



class CallableClass {
    public function __invoke($arg) {
        echo "Called with argument: $arg";
    }
}
$obj = new CallableClass();
$obj('test');  // Calls __invoke()


class Person {
    private $name;
    private $age;
    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }
    public function __debugInfo() {
        return [
            'name' => $this->name,
            'age' => $this->age,
        ];
    }
}
$person = new Person('Alice', 30);
var_dump($person);
// Outputs:
// object(Person)#1 (2) {
//   ["name"]=>
//   string(5) "Alice"
//   ["age"]=>
//   int(30)
// }

?>
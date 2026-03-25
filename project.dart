/*
class Naseim {
  String? name;
  String? lastnmae;
  int? age;
  String? room;
  int? floor;
  String?country;
  int?unmber;

  // 1. المنشئ الأساسي (للمعلومات الشخصية)
  Naseim(this.name, this.lastnmae, this.age);

  // 2. المنشئ المسمى (للمعلومات السكنية) - نضع له اسماً بعد النقطة
  Naseim.atHotel(this.room, this.floor);
  Naseim.country(this.country, this.unmber);
}

void main() {
  // استخدام المنشئ الأول
  Naseim naseim1 = Naseim("naseim", "mahadi", 27);
  
  // استخدام المنشئ المسمى
  Naseim naseim2 = Naseim.atHotel("room2", 2);

  Naseim naseim3= Naseim.country("Sudan", 9882982);

  print("الاسم: ${naseim1.name}");
  print("الغرفة: ${naseim2.room}"); // نستخدم naseim2 هنا لأنها هي التي تملك بيانات الغرفة
  print("البلد: ${naseim3.country}");
  print("الرقم:${naseim3.unmber}");

}


///الوراثه

class Mahdi{
  String? name;
  Mahdi(this.name);

}
class naseim extends Mahdi{
  String? lantionality;
  naseim(String name, this.lantionality) :super(name);
}
void main(){
  naseim naseim1=naseim("naseim", "sudan");
  print("اسم :${naseim1.name}");
  print("الجنسيه :${naseim1.lantionality}");

}

//exam
class Venicle{
String? brand;
Venicle(this.brand);
}
class car extends Venicle{
  double? price;
 car(String brand, this.price) :super(brand);

}
void main(){
    car car1=car("VMW", 12000);
  print("اسم السيارة :${car1.brand}");
  print("السعر:${car1.price}");

}

//exam2
class Gemini{
  String? teacher;
 Gemini(this.teacher);
}
class naseim extends Gemini{
  String? subject;
  naseim(String teacher,this.subject):super(teacher);
}
void main(){
     naseim n=naseim("AI", "dart");
  print("المعلم:${n.teacher}");
  print("المادة:${n.subject}");


}


//الوراثه مع تغير الداله
class Vehicle {
  String? brand;
  Vehicle(this.brand);

  // الدالة في الأب
  void startEngine() {
    print("المحرك يعمل...");
  }
}

class Car extends Vehicle {
  double? price;
  Car(String brand, this.price) : super(brand);

  // هنا مهمتك: استخدم @override لتغيير محتوى الدالة
  @override
  void startEngine() {
    print("محرك السيارة BMW يعمل!");
  }
  
}

void main() {
  Car myCar = Car("BMW", 50000);
  myCar.startEngine(); // نريدها أن تطبع الجملة الجديدة
  print("اسم السيارة :${myCar.brand}");
  print("السعر:${myCar.price}");
}
*/
/*
class BankAccount {
  double _balance = 0; // الرصيد مخفي عن العبث الخارجي

 

  // 2. الـ Setter للإيداع (deposit)
  set deposit(double amount) {
    if(amount > 0){
      _balance += amount;
    }
    // اكتب الشرط هنا
  }
   // 1. الـ Getter لرؤية الرصيد
  double get balance => _balance;

  // 3. دالة السحب (withdraw)
  void withdraw(double amount) {
    if(amount > 0 && amount <= _balance){
      _balance -= amount;
    } else {
      print("رصيدك لا يكفي");
    }
  }
}

void main() {
  BankAccount myAccount = BankAccount();

  myAccount.deposit = 500;  // إيداع ناجح
  myAccount.withdraw(200); // سحب ناجح
  myAccount.withdraw(400); // يجب أن يطبع "رصيدك لا يكفي"

  print("رصيدك النهائي هو: ${myAccount.balance}");
}
*/


//abastroct class:

// 1. المهندس الكبير يضع القاعدة (القالب)
/*
abstract class Shape {
  String name;
  Shape(this.name);

  // دالة مجردة: "أمر" لكل الأبناء بحساب المساحة
  void calculateArea(); 
}

// 2. المبرمج (الابن) ينفذ القاعدة للمربع
class Square extends Shape {
  double side;

  // استدعاء اسم الشكل من الأب (Shape) وتحديد طول الضلع
  Square(String name, this.side) : super(name);

  @override
  void calculateArea() {
    double area = side * side;
    print("مساحة $name هي: $area");
  }
}

// 3. المبرمج (الابن) ينفذ القاعدة للدائرة
class Circle extends Shape {
  double radius;

  Circle(String name, this.radius) : super(name);

  @override
  void calculateArea() {
    double area = 3.14 * radius * radius;
    print("مساحة $name هي: $area");
  }
}

void main() {
  // var s = Shape("شكل"); // ❌ خطأ! لا يمكن صنع كائن من Shape لأنه مجرد فكرة.

  Square mySquare = Square("المربع الصغير", 5);
  mySquare.calculateArea();

  Circle myCircle = Circle("الدائرة الكبيرة", 10);
  myCircle.calculateArea();
}
*/
// 1. التجريد: وضع قانون لأي عملية حسابية
abstract class Operation {
  String name;
  Operation(this.name);

  // دالة مجردة يجب على كل عملية تنفيذها بطريقتها
  double execute(double a, double b);
}

// 2. الوراثة: تنفيذ العمليات المختلفة
class Addition extends Operation {
  Addition() : super("الجمع");

  @override
  double execute(double a, double b) => a + b;
}

class Subtraction extends Operation {
  Subtraction() : super("الطرح");

  @override
  double execute(double a, double b) => a - b;
}

class Multiplication extends Operation {
  Multiplication() : super("الضرب");

  @override
  double execute(double a, double b) => a * b;
}

// 3. التغليف: كلاس المحرك الذي يدير كل شيء
class Calculator {
  double _lastResult = 0; // نتيجة مخفية (Private)

  // Getter لرؤية آخر نتيجة فقط دون تعديلها يدوياً
  double get lastResult => _lastResult;

  // دالة ذكية تستقبل أي نوع من العمليات (Polymorphism)
  void performCalculation(Operation op, double num1, double num2) {
    _lastResult = op.execute(num1, num2);
    print("نتجية عملية ${op.name} بين $num1 و $num2 هي: $_lastResult");
  }
}

void main() {
  // إنشاء المحرك
  Calculator myCalc = Calculator();

  // إنشاء قائمة بالعمليات (تعدد أشكال)
  List<Operation> ops = [Addition(), Subtraction(), Multiplication()];

  print("--- 🧮 بدء تشغيل الآلة الحاسبة الذكية ---");

  // تنفيذ العمليات ديناميكياً
  myCalc.performCalculation(ops[0], 10, 5); // جمع
  myCalc.performCalculation(ops[2], 4, 3);  // ضرب
  
  print("--- ✅ آخر نتيجة مسجلة في الذاكرة: ${myCalc.lastResult} ---");
}
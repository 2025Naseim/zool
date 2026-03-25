CREATE TABLE missing (
    id INT AUTO_INCREMENT PRIMARY KEY,       -- رقم تسلسلي لكل سجل
    name VARCHAR(100) NOT NULL,              -- اسم المفقود
    fam VARCHAR(100) NOT NULL,               -- اسم الأب
    mather VARCHAR(100) NOT NULL,            -- اسم الأم
    place VARCHAR(150) NOT NULL,             -- مكان الميلاد أو السكن
    vil VARCHAR(150) NOT NULL,               -- القرية/المدينة
    bro VARCHAR(100),                        -- اسم الأخ أو القريب
    GR VARCHAR(100),                         -- الجد أو قريب آخر
    placenow VARCHAR(150),                   -- مكان التواجد الحالي (آخر مرة شوهد فيها)
    phone VARCHAR(20),                       -- رقم الهاتف للتواصل
    email VARCHAR(100),                      -- البريد الإلكتروني للتواصل
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- وقت إدخال البلاغ
);



-- إنشاء جدول المفقودين
CREATE TABLE IF NOT EXISTS missing (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,        -- الاسم المفقود
    li VARCHAR(100) NOT NULL,          -- اسم أكبر الأسرة
    mather VARCHAR(100) NOT NULL,      -- اسم الأم
    place VARCHAR(150) NOT NULL,       -- مكان الميلاد
    vil VARCHAR(150) NOT NULL,         -- منطقة الميلاد
    bro VARCHAR(100) NOT NULL,         -- اسم أحد الإخوة
    GR VARCHAR(100) NOT NULL,          -- اسم الجار
    relation VARCHAR(100) NOT NULL,    -- صلة القرابة
    live VARCHAR(150) NOT NULL,        -- مكان إقامة الباحث
    phone VARCHAR(20) NOT NULL,        -- رقم الهاتف
    email VARCHAR(150) NOT NULL,       -- البريد الإلكتروني
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- وقت الإدخال
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE near2 (
    id INT AUTO_INCREMENT PRIMARY KEY,       -- رقم تسلسلي لكل سجل
    name VARCHAR(100) NOT NULL,              -- اسم المفقود
    birthdate DATE,                          -- تاريخ الميلاد
    locations VARCHAR(150),                  -- آخر مكان شوهد فيه
    clothes VARCHAR(150),                    -- الملابس وقت الاختفاء
    marks VARCHAR(200),                      -- علامات مميزة
    health VARCHAR(200),                     -- الحالة الصحية
    reporter VARCHAR(100) NOT NULL,          -- اسم المبلّغ
    adrees VARCHAR(200),                     -- عنوان المبلّغ أو صلة القرابة
    phone VARCHAR(20),                       -- رقم الهاتف للتواصل
    notes TEXT,                              -- ملاحظات إضافية
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- وقت إدخال البلاغ
);

CREATE TABLE near (
    id INT AUTO_INCREMENT PRIMARY KEY,       -- رقم تسلسلي لكل سجل
    name VARCHAR(100) NOT NULL,              -- اسم المفقود
    age INT,                                 -- العمر
    missing_date DATE,                       -- تاريخ الاختفاء
    locations VARCHAR(150),                  -- آخر مكان شوهد فيه
    clothes VARCHAR(150),                    -- الملابس وقت الاختفاء
    marks VARCHAR(200),                      -- علامات مميزة
    health VARCHAR(200),                     -- الحالة الصحية
    reporter VARCHAR(100) NOT NULL,          -- اسم المبلّغ
    relation VARCHAR(100),                   -- صلة القرابة
    phone VARCHAR(20),                       -- رقم الهاتف للتواصل
    notes TEXT,                              -- ملاحظات إضافية
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- وقت إدخال البلاغ
);

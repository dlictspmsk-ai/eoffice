// Server-side code (Node.js with Express and MySQL2)
// File: server.js
// ส่วนนี้คือโค้ดฝั่งเซิร์ฟเวอร์ที่ต้องนำไปรันบนโฮสติ้งของคุณ

const express = require('express');
const mysql = require('mysql2');
const cors = require('cors');
const multer = require('multer');
const path = require('path');

const app = express();
const port = 3001; // Port สำหรับรัน API Server

// เปิดใช้งาน CORS เพื่อให้ Frontend (React) เรียกใช้ API ได้
app.use(cors());
app.use(express.json());

// --- การตั้งค่าการเชื่อมต่อฐานข้อมูล ---
// ใช้ข้อมูลที่คุณให้มาโดยตรง
// **คำแนะนำด้านความปลอดภัย:** ในการใช้งานจริง ควรเก็บข้อมูลเหล่านี้ใน Environment Variables แทนการเขียนลงในโค้ดโดยตรง
const dbConnection = mysql.createConnection({
  host: 'localhost',
  port: 3306,
  user: 'spm_srb',
  password: 'Sng~?1jfVaGw2ux2', // รหัสผ่านที่คุณให้มา
  database: 'spm_srb'
});

dbConnection.connect(error => {
  if (error) {
    console.error('เกิดข้อผิดพลาดในการเชื่อมต่อฐานข้อมูล:', error);
    return;
  }
  console.log('เชื่อมต่อฐานข้อมูล spm_srb สำเร็จ!');
});


// --- การตั้งค่าพื้นที่จัดเก็บไฟล์ (File Storage) ---
// กำหนดว่าไฟล์ที่อัปโหลดจะถูกเก็บไว้ที่โฟลเดอร์ 'uploads' ในเซิร์ฟเวอร์
const storage = multer.diskStorage({
  destination: function (req, file, cb) {
    cb(null, 'uploads/') // ต้องสร้างโฟลเดอร์ชื่อ 'uploads' ในโปรเจกต์นี้
  },
  filename: function (req, file, cb) {
    // ตั้งชื่อไฟล์ใหม่เพื่อป้องกันชื่อซ้ำ
    cb(null, file.fieldname + '-' + Date.now() + path.extname(file.originalname))
  }
});
const upload = multer({ storage: storage });


// --- สร้าง API Endpoints ---

// API สำหรับดึงข้อมูลเอกสารทั้งหมด
// Frontend จะเรียกมาที่: https://saraban.spm-sk.go.th/api/documents
app.get('/api/documents', (req, res) => {
  // คำสั่ง SQL สำหรับดึงข้อมูลจากตาราง 'documents' (ต้องสร้างตารางนี้ในฐานข้อมูล)
  const query = 'SELECT * FROM documents ORDER BY date DESC';
  
  dbConnection.query(query, (error, results) => {
    if (error) {
      return res.status(500).json({ error: error.message });
    }
    res.json(results);
  });
});

// API สำหรับอัปโหลดไฟล์ (ตัวอย่าง)
// Frontend จะส่งไฟล์มาที่: https://saraban.spm-sk.go.th/api/upload
app.post('/api/upload', upload.single('documentFile'), (req, res) => {
    if (!req.file) {
        return res.status(400).send('ไม่ได้เลือกไฟล์');
    }
    // เมื่ออัปโหลดสำเร็จ เราจะได้ข้อมูลไฟล์ใน req.file
    // สามารถนำ path ของไฟล์ไปบันทึกลงฐานข้อมูลได้
    console.log('ไฟล์ถูกอัปโหลด:', req.file);
    res.status(200).json({ 
        message: 'อัปโหลดไฟล์สำเร็จ', 
        filePath: req.file.path // ส่ง path กลับไปให้ frontend
    });
});


// เริ่มรันเซิร์ฟเวอร์
app.listen(port, () => {
  console.log(`API server กำลังทำงานที่ http://localhost:${port}`);
});

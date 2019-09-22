#Tools
1. Visual Studio Code IDE
2. Arduino IDE
3. PHP Language
4. CloudMqtt WebSocket

#Hardware
5. Servo
6. NodeMCU

#description
locker OTP Project เป็นโปรเจคที่ได้พัฒนาในตอนเรียนปีสาม 
ความสามารถของโปรเจคนี้คือเราจะมีล็อคเกอร์ไว้สำหรับใช้ในทั่วไปโดยทุกนสามารถจองล็อคเกอร์ได้ 
ซึ่งถ้าล็อกเกอร์ไหนถูกจองแล้วก็จะเปลี่ยนแปลงสถานะเป็นจองแล้ว และจะแสดงล็อกเกอร์เฉพาะที่ยังว่างอยู่ 
โดยเราจะมีการส่ง OTP มาให้เมื่อทำการล็อคอินเข้ามาทำการจองในระบบ 
เมื่อมีการจองเกิดขึ้นล็อกเกอร์นั้นก็จะเปิดโดยมีการสั่งงานจาก CloudMqtt ในการพัฒนานี้เราพัฒนาโดยใช้ PHPร่วมกับ CloudMqtt และ Servo และ Node MCUครับ

from fastapi import APIRouter, Depends
from sqlalchemy.orm import Session
from pydantic import BaseModel

from ..database import SessionLocal
from ..models import Student


router = APIRouter(
    prefix="/students",
    tags=["Students"]
)


def get_db():

    db = SessionLocal()

    try:
        yield db
    finally:
        db.close()


class StudentCreate(BaseModel):

    name: str
    email: str
    course: str


@router.get("/")
def get_students(db: Session = Depends(get_db)):

    students = db.query(Student).all()

    return students


@router.post("/")
def create_student(
    student: StudentCreate,
    db: Session = Depends(get_db)
):

    new_student = Student(
        name=student.name,
        email=student.email,
        course=student.course
    )

    db.add(new_student)

    db.commit()

    db.refresh(new_student)

    return new_student


@router.delete("/{student_id}")
def delete_student(
    student_id: int,
    db: Session = Depends(get_db)
):

    student = db.query(Student).filter(
        Student.id == student_id
    ).first()

    if not student:

        return {
            "message": "Student not found"
        }

    db.delete(student)

    db.commit()

    return {
        "message": "Student deleted successfully"
    }